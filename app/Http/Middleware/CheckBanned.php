<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CheckBanned
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
        if (auth()->check() && auth()->user()->banned_till!=null) {

            $date1 = Carbon::createFromFormat('Y-m-d H:i:s', '1970-01-01 00:00:00');
            $date2 = Carbon::createFromFormat('Y-m-d H:i:s', auth()->user()->banned_till);

            if($date1->eq($date2)){
                $message='لقد تم حظر حسابك بشكل دائم.';
                auth()->logout();
                return redirect()->back()->withErrors(['message'=>$message]);
            }      
            else if (now()->lessThan(auth()->user()->banned_till)){
                $banned_days = (now()->diffInDays(auth()->user()->banned_till))+1;
                $message = 'لقد تم حظر حسابك مؤقتاً لمدة '.$banned_days.' يوم';
                auth()->logout();
                return redirect()->back()->withErrors(['message'=>$message]);
            }
            
        }
        
        return $next($request);
    }
}
