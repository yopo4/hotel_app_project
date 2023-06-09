<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidationCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->validated == 1 || (auth()->user()->validated == 0 && auth()->user()->role == 'Customer')) {
            return $next($request);
        }

        return redirect()->back()->with('failed', 'You are not authorized');
    }
}
