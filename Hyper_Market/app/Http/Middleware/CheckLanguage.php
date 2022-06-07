<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CheckLanguage
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->hasHeader('accept-language')){
            return ApiTrait::errorMessage(['language'=>"Language Key Is Missed"],"",422);
        }
        if(!in_array($request->header('accept-language'),config('app.allowed-languages'))){
            return ApiTrait::errorMessage(['language'=>"Language Not Supported"],"",422);
        }
        App::setLocale($request->header('accept-language'));
        return $next($request);
    }
}
