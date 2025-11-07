<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Middleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $user = auth()->user() ? auth()->user()->name : 'Invitado';
        $method = $request->method();
        $url = $request->fullUrl();

        Log::channel('daily')->info("[$user] realizó una acción: $method $url");

        return $response;
    }
}
