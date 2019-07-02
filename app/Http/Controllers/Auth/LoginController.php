<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRole;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectTo(){
        $user = \Auth::user();
        $roles = $user->getRoleNames();
        if($roles[0] == 'User' && $roles[1]??'' != 'User'){
            return "/dashboard";
        }elseif($roles[0] == 'User'){
            return "/beranda";
        }
        return "/dashboard";
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
