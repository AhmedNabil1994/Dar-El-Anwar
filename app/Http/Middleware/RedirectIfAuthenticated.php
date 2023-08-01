<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::guard('admins')->check()) {
            return redirect(route('admin.dashboard'));
        }
        else if (Auth::guard('parents')->check()) {
            return redirect(route('parents.dashboard'));
        }
        else if (Auth::guard('students')->check()) {
            return redirect(route('student.dashboard'));
        }
        else if (Auth::guard('instructors')->check()) {
            return redirect(route('instructor.dashboard'));
        }

        return $next($request);

    }
}
