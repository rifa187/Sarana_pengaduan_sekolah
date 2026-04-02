<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminSession
{
    /**
     * Use a separate session cookie for admin routes,
     * so admin and student can be logged in simultaneously in different tabs.
     */
    public function handle(Request $request, Closure $next): Response
    {
        config([
            'session.cookie' => config('app.name', 'laravel') . '-admin-session',
        ]);

        return $next($request);
    }
}
