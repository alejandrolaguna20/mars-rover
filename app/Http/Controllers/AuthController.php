<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return Inertia::render("Login");
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }

        $user = User::where('name', $credentials['name'])->first();

        if (!$user) {
            $user = User::create([
                'name' => $credentials['name'],
                'email' => $credentials['name'], // just to make it easier, this is a demo, so it does not matter much
                'password' => Hash::make($credentials['password']),
            ]);

            Auth::login($user);
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors([
            'password' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
