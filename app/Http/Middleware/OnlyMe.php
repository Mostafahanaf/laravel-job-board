<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyMe
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check()){
            if(auth()->user()->email == 'mmm@gmail.com'){
                return $next($request);
            }
            return response(["message"=> "Access is not proper"],403);
        }
        return redirect("/login");
    }
}
