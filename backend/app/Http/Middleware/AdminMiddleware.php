<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Gate::allows('admin')) {
            return response()->json([
                'error' => [
                    'code' => 403,
                    'message' => 'Доступ запрещён.',
                ],
            ], 403);
        }

        return $next($request);
    }
}
