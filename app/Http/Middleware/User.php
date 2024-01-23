<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = Auth::user()->role;
        if (Auth::check()) {
            switch ($role) {
                case 'superadmin':
                    return redirect()->route('superadmin.index');
                    break;

                case 'admin':
                    return redirect()->route('admin.index');
                    break;

                default:
                    return $next($request);
                    break;
            }
        }
        return redirect('/');
    }
}
