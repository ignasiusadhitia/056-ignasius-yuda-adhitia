<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register
    public function register(Request $request)
    {
        if ($request->isMethod("post")) {

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|lowercase|max:255,unique:users',
                'password' => 'required'
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ])) {
                return to_route('dashboard');
            } else {
                return to_route('register');
            }
        }

        return view('auth.register');
    }
}
