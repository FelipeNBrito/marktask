<?php

namespace App\Http\Middleware;

use App\Helpers\AuthorizationHelper;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Authorization
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
        if (AuthorizationHelper::isAdmin(Auth::id())) {
            return $next($request);
        } else {
            return Redirect::route('notaccess');
        }
    }
}
