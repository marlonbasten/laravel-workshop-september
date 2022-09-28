<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIsSuperadminMiddleware
{
    public function handle(Request $request, Closure $next, int $id)
    {
        if ((!auth()->check() || auth()->id() !== $id) && $request->trashed) {
            abort(403);
        }

        return $next($request);
    }
}
