<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->user()->isAdmin()) {
            toastr()->error('You do not have permission to access that page.', 'Error');
            return redirect()->route('dashboard')
            // ->with('error', 'You do not have permission to access this page.')
            ;
        }

        return $next($request);
    }
}