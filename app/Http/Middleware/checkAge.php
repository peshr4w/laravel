<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkAge
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
       if($request->id>20){
        echo "the age is greater tha 20";
       }
       else if($request->id == 20){
        echo "the age is 20";
       }
       else{
        echo "the age is smaller than 20";
       }
        return $next($request);
    }
}
