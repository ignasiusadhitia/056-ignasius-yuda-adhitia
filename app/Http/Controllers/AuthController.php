<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Score;
use App\Models\User;
use App\Models\UserAnswer;
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
                return to_route('login')->with('success', 'Registration successful! Log in now to get started.');
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

                return to_route('dashboard')->with('success', 'Welcome back! You\'re logged in.');
            } else {
                return to_route('login')->with('error', 'Invalid email or password. Please try again.');
            }
        }

        return view('auth.login');
    }

    public function getCurrentUserRank()
    {
        $user = auth()->user();

        $userRank = null;

        if ($user) {
            $userScore = $user->score ? $user->score->score : 0;

            $userRank = Score::where('score', '>', $userScore)->count() + 1;
        }

        return $userRank;
    }

    public function getCreatedQuestionsCount()
    {
        return Question::where('user_id', Auth::id())->count();
    }

    public function getAnsweredQuestionsCount()
    {
        return UserAnswer::where('user_id', Auth::id())->count();
    }

    public function dashboard()
    {
        $userRank = $this->getCurrentUserRank();
        $createdQuestionsCount = $this->getCreatedQuestionsCount();
        $answeredQuestionsCount = $this->getAnsweredQuestionsCount();

        return view('dashboard', compact('userRank', 'createdQuestionsCount', 'answeredQuestionsCount'));
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
            $request->image->move(public_path('assets/images'), $imageName);
            $user->image = $imageName;

            $user->save();

            return to_route('profile')->with('success', 'Profile updated successfully!');
        }

        return view('profile');
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return to_route('login')->with('success', 'You\'re logged out now. See you soon!');
    }
}
