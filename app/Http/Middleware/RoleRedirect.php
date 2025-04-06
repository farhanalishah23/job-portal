<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
{
    if (Auth::check()) {
        $userRole = Auth::user()->role; 
        if ($userRole !== $role) {
            return abort(403, 'Unauthorized access');
        }
        return $next($request); 
    }
    return redirect()->route('login');
}

}
