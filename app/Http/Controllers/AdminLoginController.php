<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function getLogin() {
        if (Auth::check()) {
            return redirect('/dashboard');
        } else {
            return view('admin.login');
        }
    }

    public function postLogin(LoginRequest $request) {
        $login = [
            'email' => $request->txtEmail,
            'password' => $request->txtPassword,
            'level' => 1,
            'status' => 1
        ];
        if (Auth::attempt($login)) {
            return redirect('/dashboard');
        } else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
    }
    
    public function success() {
        return view('admin.welcome');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
    
}
