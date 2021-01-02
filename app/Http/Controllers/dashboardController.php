<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class dashboardController extends Controller
{
    public function redirect()
    {
        if (! Auth::check())
        {
            return redirect(route('login'));
        }

    	if (Auth::User()->isUser())
    	{
    		return redirect(route('user_dashboard'));
    	}
    	elseif (Auth::User()->isAdmin())
    	{
    		return redirect(route('admin_dashboard'));
    	}

    	return redirect(route('login'));
    }

}
