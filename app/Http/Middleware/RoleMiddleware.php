<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Kullanıcının rolünü kontrol eder.
     *
     * @param  \Illuminate\Http\Request        $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string                          $role   Beklenen rol (admin|staff)
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        $currentRole = $request->session()->get('role');

        if ($currentRole !== $role) {
            abort(403, __('Bu sayfaya erişim yetkiniz yok.'));
        }

        return $next($request);
    }
}
