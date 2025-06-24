<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
       
    ];

    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\SetLocale::class,
            \App\Http\Middleware\RoleMiddleware::class,
        ],
        'api' => [
            \Illuminate\Routing\Middleware\ThrottleRequests::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * Route middleware aliases.
     *
     * Laravel 10+ uses $middlewareAliases instead of $routeMiddleware.
     */
    protected $middlewareAliases = [
        'auth'            => \App\Http\Middleware\Authenticate::class,
        'auth.basic'      => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session'    => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers'   => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can'             => \Illuminate\Auth\Middleware\Authorize::class,
        'guest'           => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm'=> \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed'          => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle'        => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified'        => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

       'role'            => \App\Http\Middleware\RoleMiddleware::class,
    ];
}
