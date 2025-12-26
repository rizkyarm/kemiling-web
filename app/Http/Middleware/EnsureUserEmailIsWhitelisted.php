<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserEmailIsWhitelisted
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if (!$user) {
            abort(401);
        }

        $allowed = config('admin.allowed_emails', []);
        $allowed = array_map('strtolower', $allowed);

        $email = strtolower((string) $user->email);
        if (!in_array($email, $allowed, true)) {
            abort(403);
        }

        return $next($request);
    }
}
