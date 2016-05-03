<?php

namespace App\Http\Middleware;
use Session;
use Closure;

class userMiddleware
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

        if(!Session::has('SemployeID')){
           
             return redirect()->action('authentificationCOntroller@index');

        }
        
        return $next($request);
        
    }

}
