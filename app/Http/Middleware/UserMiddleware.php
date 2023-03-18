<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Cache;
use App\Models\User;

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

        if(Auth::check() && Auth::user()->Isban){
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'Banned' => 'Your account has been Disabled'
            ]);
        }


        if(Auth::check()){
            $expiredTime = Carbon::now()->addSeconds(30);
            Cache::put('isOnline'. Auth::id(), true, $expiredTime);
            User::where('id', Auth::id())->update(['last_seen' => Carbon::now()]);
        }


        if(Auth::check() && Auth::user()->role_id == 2){
            return $next($request);
        }else {
            return redirect()->route('login');
        }
    }
}
