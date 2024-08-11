<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

// logging
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // jenis metode = get
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // jenis metode = post
    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'))) {
            // Authentication passed, redirect to dashboard
            return redirect()->route('books.index');
        }

        // Authentication failed, redirect back with error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // jenis metode = post
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    // jenis metode = get
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // jenis metode = post
    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:dns|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Log the request data
        Log::info('Register request data', $request->all());

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to dashboard
        return redirect()->route('books.index');
    }
}