<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Activos
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
        if(Auth()->check()){
            if(auth()->user()->status=='Active'){

                return $next($request);
            }

        }
        return redirect()->route('home.index')
        ->withDanger("Usted No es un usuario activo");
    }
}
