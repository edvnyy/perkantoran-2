<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use App\Http\Controllers\logout;

class sesiController extends Controller
{
    function index(){
        return view('login');
    }
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if(Auth::user()->role == 'admin'){
                return redirect('karyawan');
            }
            elseif(Auth::user()->role == 'staf'){
                return redirect('gaji');
            }
        } else {
            return back()->withErrors(['message' => 'Username dan password yang dimasukkan tidak sesuai'])->withInput();
        }
     }
     public function logout()
{
    Auth::logout();
    return redirect('');
}
}

