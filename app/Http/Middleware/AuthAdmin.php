<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user->type == 'admin'){
                if($user->is_blocked){
                    Session::flash('error', 'Your account was blocked.');
                    Auth::logout();
                    return redirect(route('auth.login-admin'))->send();
                }

                return $next($request);
            }else{
                abort(401);
            }
        }else{
            return redirect('/')->send();
        }
    }
}
