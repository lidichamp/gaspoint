<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotStoreOwner
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'store_owner')
	{
	    if (!Auth::guard($guard)->check()) {
	        return redirect('store-owner/login');
	    }

	    return $next($request);
	}
}