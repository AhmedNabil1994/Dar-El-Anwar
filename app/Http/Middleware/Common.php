<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Common
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /**
         * role 2 instructor
         * only instructor can access instructor panel
         */

        if (file_exists(storage_path('installed'))) {
                if (!empty(Auth::user()) && (Auth::user()->role == USER_ROLE_STUDENT || Auth::user()->role == USER_ROLE_INSTRUCTOR)) {
                    return $next($request);
                } else {
                    abort('403');
                }
        } else {
            return redirect()->to('/install');
        }
    }
}
