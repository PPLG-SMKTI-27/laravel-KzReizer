<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if ($credentials['email'] === '123@gmail.com' && $credentials['password'] === '123') {
        return redirect('/project')->with('success', 'Login berhasil!');
    }




        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }
}