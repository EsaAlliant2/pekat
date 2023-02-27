<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Request\Auth\LoginRequest;
use App\Providers\RouteServisProvider;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard');
        }
        return redirect(route('login'))->with('gagal', 'Username atau Password salah');
    }

    public function store(LoginRequest $request)
    {
        $request->autenticate();

        $request->session()->regenerate();
        
        return redirect(RouteServiceProvider::HOME);
    }
    public function logout()
    {
        Auth::logout();

        return redirect(route('login'));
    }

    public function register()
    {
        return view('auth.register');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
