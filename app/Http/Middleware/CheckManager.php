<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && auth()->user()->role!=1)
            //Note that trying to return a view from middleware will an error. 
            //It is better to return a redirect response to the route that handles 
            //the view instead of trying to return the view itself: 
            //return redirect()->route('route.to.payments.payment');
            return response()->view('errors.403');
        return $next($request);
    }
}
