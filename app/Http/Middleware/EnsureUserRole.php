<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

// Helper
use Auth;

class EnsureUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    //  Middleware perlu didaftarkan di Kernel.php
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();
        if($role == 'admin' && !$user->is_admin || $role == 'user' && $user->is_admin){
            // $request->session()->flash('error', "You do not have access to that page");
            // return redirect(route('welcome'));
            abort(403);
        }
        return $next($request);
    }
}
