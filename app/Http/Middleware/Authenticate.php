<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class   Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        $response = $next($request);

        $response->header('Authorization', 'Bearer ' . session('token'));

        return $response;
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}
