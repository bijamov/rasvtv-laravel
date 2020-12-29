<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check())
        {
            return redirect(route('login'));
        }
        if (Auth::user()->isUser())
        {
            return $next($request);
        }
        elseif (Auth::user()->isAdmin())
        {
            return redirect(route('login'));
        }

        abort(404);
    }
}
