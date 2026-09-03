<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Http\Requests\SignupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showSignupForm()
    {
        return view('auth.signup', ['pageTitle' => 'Sign Up']);
    }

    public function signup(SignupRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); // تشفير الباسورد

        $user->save();

        auth()->guard()->login($user);

        return redirect('/');
    }

    public function showLoginForm()
    {
        return view('auth.login', ['pageTitle' => 'Login']);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->guard()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        auth()->guard()->logout();

        return redirect('/');
    }
}
