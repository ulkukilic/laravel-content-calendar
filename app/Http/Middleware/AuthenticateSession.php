<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateSession
{
    public function handle(Request $request, Closure $next): Response
    {dd($request->all());
        if (!$request->session()->has('user_id')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}