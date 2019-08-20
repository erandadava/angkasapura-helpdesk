<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRole;
trait AuthenticatesUsers
{
    use RedirectsUsers, ThrottlesLogins;

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            $user = \Auth::user();
            $roles = $user->getRoleNames();
            if($roles[0] == 'User'){
                return redirect('/beranda');
            }
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);
        // $client = new Client();
        // $requestnya = $client->request('GET','https://developer.angkasapura2.co.id/mobile/ldap/is_valid/', [
        //     'form_params' => [
        //         'username' => $request->username,
        //         'password' => $request->password
        //     ]
        // ]);
        // $url = "https://developer.angkasapura2.co.id/mobile/ldap/is_valid/";
                     
        //              $curl = curl_init($url);
        //              curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //              curl_setopt($curl, CURLOPT_POST, true);
        //              curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
        //              curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        //              curl_exec($curl);
        //              curl_close($curl);
        // dd($curl);

        $curl_post_data = array(
            'username' => $request->username,
            'password' => $request->password 
         );
        $curl = curl_init('https://developer.angkasapura2.co.id/mobile/ldap/is_valid/');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $hasil =  json_decode($response , true);

        if($hasil['status'] == 'ok'){
            $cek = \App\User::where('username', $hasil['username'])->first();
            if(empty($cek)){
                $potong = explode(" ",$hasil["unit_name"]);

                $cek_unit_kerja = \App\Models\unit_kerja::where('nama_uk', $hasil["unit_name"])->first();
               
                if(!$cek_unit_kerja){
                    $id_unit_kerja = \App\Models\unit_kerja::create(['nama_uk' => $hasil["unit_name"]])->id;

                }else{
                    $id_unit_kerja = $cek_unit_kerja['id'];
                }

                if(count($potong)>0){
                    $role = \App\Models\roles::where('name', 'like', '%'.$potong[0].'%'.$potong[1].'%')->first();
                }
                
                    $create_user = \App\User::insert([
                        'username' => $hasil['username'],
                        'nip' => $hasil['nip'],
                        'name' => $hasil['name'],
                        'password' => bcrypt($request->password),
                        'verified' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'id_unit_kerja' => $id_unit_kerja
                    ]);
                if($role){
                    $user_baru = \App\User::find(\DB::getPdo()->lastInsertId());
                    $user_baru->assignRole($role['name']);
                }else{
                    $user_baru = \App\User::find(\DB::getPdo()->lastInsertId());
                    $user_baru->assignRole('User');
                }   
            }
        }

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // // If the login attempt was unsuccessful we will increment the number of attempts
        // // to login and redirect the user back to the login form. Of course, when this
        // // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
