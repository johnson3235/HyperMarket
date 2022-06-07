<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketingEmpMiddlewaare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
     */
    public function handle(Request $request, Closure $next,$guard = 'employee')
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::guard($guard)->user()->type == 1)
            {
                return redirect()->route('employee.index');
            }
            else if(Auth::guard($guard)->user()->type == 0)
            {

            }

        }
        return $next($request);
    }
}
