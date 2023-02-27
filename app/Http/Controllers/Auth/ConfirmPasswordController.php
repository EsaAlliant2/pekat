<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmPasswordController extends Controller
{
    public function show(Request $request)
    {
        return view('auth.confirm-password');
    }

    public function store (Request $request)
    {
        if (!Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $Request->password,
        ])) {
            throw ValidationException::withMesseges([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());
        return redirect()->untended(RouteServiceProvider::HOME);
    }
}
