<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = auth()->user()->roles;

        foreach ($roles as $role) {
            if ($role->id === 2){
                if (auth()->check()) {
                    return redirect()->route('home');
                } else {
                    return view('auth.login');
                }
            } else {
                if (auth()->check()) {
                    return redirect()->route('dashboard');
                } else {
                    return view('auth.login');
                }
            }
        }
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
