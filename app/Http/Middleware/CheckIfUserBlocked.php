<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIfUserBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = $request->header('User-Id');
        $user = \App\Models\User::find($userId);

        if ($user && $user->is_blocked) {
            return response()->json(['error' => 'Пользователь заблокирован'], 403);
        }

        return $next($request);
    }
}
