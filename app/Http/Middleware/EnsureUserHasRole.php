<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $role = Role::fromString($role);

        if (!$request->user()->hasRole($role)) {
            return redirect()->route(Auth::user()->role->route());
        }

        return $next($request);
    }
}
