<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClearPermissionCache
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        return $next($request);
    }
}
