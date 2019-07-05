<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRole;
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $user = \Auth::user();
            $roles = $user->getRoleNames();
            if(count($roles)>0){
                if($roles[0] == 'User'){
                    return redirect('/beranda');
                }
            }
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
