<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Illuminate\Foundation\Http\Middleware\TrimStrings;
use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance;
use Illuminate\Foundation\Http\Middleware\ValidateSignature;
use Illuminate\Foundation\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Illuminate\Foundation\Http\Middleware\CheckForAnyMaintenanceMode;
use Illuminate\Foundation\Http\Middleware\HandleCors;
use Illuminate\Foundation\Http\Middleware\TrustProxies;
use Illuminate\Http\Middleware\HandleCors as LaravelHandleCors;
use Illuminate\Http\Middleware\SetCacheHeaders;
use Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets;
use Illuminate\Http\Middleware\FrameGuard;
use Illuminate\Http\Middleware\TrustHosts;
use Illuminate\Http\Middleware\ValidateSignature as HttpValidateSignature;
use Illuminate\Http\Middleware\Authorize;

use App\Http\Middleware\EncryptCookies;
use App\Http\Middleware\AddQueuedCookiesToResponse;
use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Middleware\SetLocale;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // Handle proxies, CORS, maintenance, post size, trimming, etc.
        TrustProxies::class,
        HandleCors::class,
        PreventRequestsDuringMaintenance::class,
        ValidatePostSize::class,
        TrimStrings::class,
        ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
             \App\Http\Middleware\EncryptCookies::class,
             \App\Http\Middleware\AddQueuedCookiesToResponse::class,
             \Illuminate\Session\Middleware\StartSession::class,
             \Illuminate\View\Middleware\ShareErrorsFromSession::class,
             \App\Http\Middleware\VerifyCsrfToken::class,
             \Illuminate\Routing\Middleware\SubstituteBindings::class,
              \App\Http\Middleware\SetLocale::class,
        ],

        'api' => [
            // If using Laravel Sanctum or stateful APIs:
            EnsureFrontendRequestsAreStateful::class,

            'throttle:api',
            SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth'       => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can'        => \Illuminate\Auth\Middleware\Authorize::class,
        'guest'      => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed'     => HttpValidateSignature::class,
        'throttle'   => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified'   => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        // Your custom locale middleware is only in the web group.
    ];
}
