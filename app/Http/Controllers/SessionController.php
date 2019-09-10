<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function loginPage() {
        return view('login');
    }

    public function loginAuth() {
        $credentials = request(['email', 'password']);
        if(!auth()->attempt($credentials))
        {
            return back()->withErrors('Invalid Credentials');
        }
        return redirect()->route('home');
    }

    public function logout()
    {
        auth()->logout();
        return back();
    }
}
