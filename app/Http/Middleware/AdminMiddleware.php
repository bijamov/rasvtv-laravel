<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
// use Illuminate\Contracts\Auth;

class AdminMiddleware
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
            return redirect(route('login'));
        }
        elseif (Auth::user()->isAdmin())
        {
            return $next($request);
        }

        abort(404);
    }
}
