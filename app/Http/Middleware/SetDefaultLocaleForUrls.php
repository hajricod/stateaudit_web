<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class SetDefaultLocaleForUrls
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
        $pos  = strrpos($request->path(), 'ar') ? strrpos($request->path(), 'ar') : strrpos($request->path(), 'en');
        $uri  = substr($request->path(), $pos, 2);
        $lang = $uri == "ar" || $uri == "en" ? $uri : App::getLocale();
        $data = ['locale' => $lang];

        URL::defaults($data);
        App::setLocale($data['locale']);

        return $next($request);
    }
}
