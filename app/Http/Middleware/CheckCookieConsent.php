<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCookieConsent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        if (!$request->cookies->has('cookie_consent')) {
            view()->share('showCookiePopup', true);
        } else {
            view()->share('showCookiePopup', false);
        }

        return $next($request);
    }
}
