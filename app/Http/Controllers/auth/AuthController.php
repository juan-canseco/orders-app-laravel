<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function index() {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function login(Request $request) {

        $validator = $request->validate([
            'email' => 'required',
            'password' => 'required|min:3'
        ]);

        if (Auth::attempt($validator)) {
            return redirect()->route('home');
        }

        return back()->withErrors(['Email u/o Contraseña incorrectos.']);
    }

    public function logout() {
        Session:flush();
        Auth::logout();
        return redirect('/login');
    }
}
