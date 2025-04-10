<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CompanyStatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if((Auth::user()->hasRole('company') ||Auth::user()->hasRole('staff_member')||Auth::user()->hasRole('manager') ||Auth::user()->hasRole('patient')) && Auth::user()->status!="approved"){
            Auth::logout();
            return redirect('login')->with('status','You have been blocked from  administrator. Kindly contact us for further details...');
        }
        return $next($request);
    }
}
