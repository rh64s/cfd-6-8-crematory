<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cors
{
    /**
     * Set CORS for request
     * *
     * * @param \Illuminate\Http\Request $request
     * * @param \Closure $next
     * * @return mixed
 */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request)->header('Access-Control-Allow-Origin', '*');
    }
}
