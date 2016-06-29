<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AdminMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request,  Closure $next)
	{
//			if(Session::has('role')) {
//				if (Session::get('role') == 0) {
//
//					return redirect()->back();
//				}
//			}
			return $next($request);


	}

}
