<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

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

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ])) {

                return to_route('dashboard');
            } else {
                return to_route('login')->with('error', 'Invalid login details');
            }
        }

        return view('auth.login');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function profile(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'name' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $id = auth()->user()->id;

            $user = User::findOrFail($id);

            $user->name = $request->name;

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $user->image = $imageName;

            $user->save();

            return to_route('profile')->with('success', 'Successfully, profile updated');
        }

        return view('profile');
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return to_route('login')->with('success', 'Logged out successfully');
    }
}
