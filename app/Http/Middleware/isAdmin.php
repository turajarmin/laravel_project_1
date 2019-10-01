<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
{

    public function handle($request, Closure $next,$role)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->isAdmin($role) == true) {
                return $next($request);
                return redirect()->route('Admin.Slider');
            }else{
                return redirect('/');
            }

        } else {
            return redirect()->route('login');
        }
    }
}
