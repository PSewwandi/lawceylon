<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Http\Middleware\Authenticate;

class MustBeAdmin
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
        if($request->user() && $request->user()->isAdmin())
        {
            return $next($request);//if authenticated process request

        }else{
            return redirect('/');//if not authenticated redirect to homepage
        }

    }
    
}
