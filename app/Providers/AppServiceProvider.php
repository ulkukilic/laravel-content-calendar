<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;            
use App\Http\Middleware\RoleMiddleware;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
          /** @var Router $router */
        $router = $this->app->make(Router::class);

        //Register the 'role' alias so role:staff/admin resolves correctly
        $router->aliasMiddleware('role', RoleMiddleware::class);
    
    }
}
