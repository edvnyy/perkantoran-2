<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        if(auth()->user()->role == $role){
            return $next($request);
        }
        // $allowedRoles = explode(',', $role);

        // if (!in_array(auth()->user()->role, $allowedRoles)) {
        //     if (auth()->user()->role == 'admin') {
        //         return redirect()->route('karyawan.index')->with('access_denied', 'Anda tidak memiliki akses untuk melihat tabel gaji.');
        //     }
        //     if (auth()->user()->role == 'staf') {
        //         return redirect()->route('karyawan.index')->with('access_denied', 'Anda tidak memiliki akses untuk melihat tabel karyawan.');
        //     }
        // }

    }
}




