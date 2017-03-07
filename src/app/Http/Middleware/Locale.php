<?php

namespace App\Http\Middleware;

use Closure, Session, Cookie, App;

class Locale
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

        if(Cookie::get('lang')){
            $cookie = Cookie::get('lang');
            App::setLocale($cookie);
        }
        // dd(Cookie::get('lang'));
        return $next($request);
    }
}
