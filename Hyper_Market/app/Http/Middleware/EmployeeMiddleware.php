<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = 'employee')
    {

        if (Auth::guard($guard)->check()) {
            if(Auth::guard($guard)->user()->type == 1)
            {

            }
            else if(Auth::guard($guard)->user()->type == 0)
            {
                return redirect()->route('EmpMarketing.index');
            }

        }
        return $next($request);
    }
}
