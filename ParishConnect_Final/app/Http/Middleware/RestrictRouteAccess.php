<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class RestrictRouteAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // Check if the authenticated user is trying to access any restricted route
        if ($request->is('typography', 'maps', 'table') && auth()->check()) {
            // Redirect them to the appropriate route
            return redirect('/home');
        }

        // Allow the request to continue to its intended destination
        return $next($request);
    }
}
