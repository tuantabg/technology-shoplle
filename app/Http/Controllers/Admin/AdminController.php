<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function login()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
        return view('authen.login');
    }

    public function postLogin(Request $request)
    {
        $remember = $request->has('remember_me') ? true : false;
        if (auth()->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $remember)){
            return redirect()->route('dashboard');
        };
    }
}
