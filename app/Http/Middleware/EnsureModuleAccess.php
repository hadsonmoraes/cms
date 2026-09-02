<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureModuleAccess
{
    public function handle(Request $request, Closure $next, ?string $module = null)
    {
        $user = $request->user();
        $module ??= explode('.', (string) $request->route()?->getName())[1] ?? null;

        if ($user?->role === 'admin' || !$module || $user?->moduleAccesses()->where('module', $module)->exists()) {
            return $next($request);
        }

        abort(403, 'Você não tem acesso a este módulo.');
    }
}
