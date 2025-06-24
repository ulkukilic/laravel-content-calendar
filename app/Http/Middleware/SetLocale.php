<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     * Eğer session’da 'locale' varsa, uygulama dilini oraya göre ayarlar.
     */
    public function handle($request, Closure $next, ...$types)
    {
        if ($locale = session('locale')) {
            App::setLocale($locale);
        }
        return $next($request);
    }
}
