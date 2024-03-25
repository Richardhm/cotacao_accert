<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class CheckConfig
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->check == 0) {
            if(auth()->user()->tenant()->first()->tipo == 1) {
                return redirect(route('home.config'));
            } else {
                return redirect(route('home.configuracao'));
            }
        }
        return $next($request);
    }
}
