<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     return $next($request);
	// }
	public function handle($request, Closure $next, $guard = null) {
		if (Auth::guard($guard)->check()) {
			// if(Auth::user()->admin()) {
				return $next($request);
			// }
			// else {
				// return redirect('/');
			// }
		}
		else {
			return redirect()->guest(route('admin.login'));
		}
	}
}
