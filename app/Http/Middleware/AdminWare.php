<?php

namespace App\Http\Middleware;

use App\enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!Auth::check()|| !(Auth::user()->role->value === UserRole::Admin->value)){
            abort(Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
