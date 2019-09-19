<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->isAdmin()) {
            // Logout
            Auth::logout();
            // Send email to admin about unauthorised request
            // TODO: Once email implemented
            // Redirect home
            return redirect('/');
        }
        return $next($request);
    }
}
