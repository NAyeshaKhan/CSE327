<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class Player
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 'scout') {
            return redirect()->route('scout');
        }

        if (Auth::user()->role == 'player') {
            return $next($request); //when the role is equal to the player 
			//we use the return the $next method else we redirect to the other routes.
        }

        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin');
        }
    }
}
