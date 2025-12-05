<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user || !$user->is_admin) {
            return response()->json([
                'success' => false,
                'error' => [
                    'code' => 403,
                    'message' => 'Доступ к данному инструменту есть лишь у администратора.',
                ],
            ], 403);
        }

        return $next($request);
    }
}
