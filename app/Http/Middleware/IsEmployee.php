<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsEmployee
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && strtolower(auth()->user()->type) == 'employee') {
            return $next($request);
        }
        return redirect()->route('home');
    }
}
