<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsoleController extends Controller
{

    public function dashboard()
    {
        return view('console.dashboard');
    }

    public function about()
    {
        return view('console.about');
    }

    public function loginForm()
    {
        return view('console.login');
    }

    public function login()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt($attributes))
        {
            return view('/console/dashboard');
        }

        return back()
            ->withInput()
            ->withErrors(['email' => 'Invalid email/password']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

}
