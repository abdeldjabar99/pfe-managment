<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect('/admin/login');
        }
        /*else {
            $role = Auth::user()->role->name; 
           // dd($role);

            switch ($role) {
                case 'admin':
                return redirect('/admin');
                break;
                case 'teacher':
                return redirect('/admin');
                break;
                case 'student':
                    return redirect('/home');
                    break; 
        }
        }*/
       

    
        
        return $next($request);
    }
}
