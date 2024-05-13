<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use App\Models\UserAnswer;
use Illuminate\Http\Request;

class TriviaController extends Controller
{
    public function play(Request $request)
    {
        $question = Question::whereDoesntHave('userAnswers', function ($query) {
            $query->where('user_id', auth()->id());
        })->orWhereHas('userAnswers', function ($query) {
            $query->where('user_id', auth()->id())->where('answered_correctly', false);
        })->inRandomOrder()->first();

        if (!$question) {
            return redirect()->route('leaderboard')->with('message', 'You have answered all questions!');
        }

        $nextQuestion = Question::whereDoesntHave('userAnswers', function ($query) {
            $query->where('user_id', auth()->id());
        })->orWhereHas('userAnswers', function ($query) {
            $query->where('user_id', auth()->id())->where('answered_correctly', false);
        })->inRandomOrder()->first();

        return view('trivia', compact('question', 'nextQuestion'));
    }

    public function answer(Request $request)
    {
        $request->validate([
            'question_id' => 'required|integer',
            'answer_id' => 'required|integer',
        ]);

        $question = Question::find($request->question_id);

        if (!$question) {
            abort(404);
        }

        $correct = $question->answer_id === $request->answer_id;

        $userAnswer = UserAnswer::create([
            'user_id' => auth()->id(),
            'question_id' => $question->id,
            'answered_correctly' => $correct,
        ]);

        if ($correct) {
            $user = User::find(auth()->id());
            $user->increment('score');
            $user->user();
        }

        $nextQuestion = Question::whereDoesntHave('userAnswers', function ($query) {
            $query->where('user_id', auth()->id());
        })->orWhereHas('userAnswers', function ($query) {
            $query->where('user_id', auth()->id())->where('answered_correctly', false);
        })->inRandomOrder()->first();

        return redirect()->route('trivia.play')->with([
            'message' => $correct ? 'Correct!' : 'Incorrect.',
            'nextQuestion' => $nextQuestion,
        ]);
    }

    public function leaderboard()
    {
        $users = User::orderBy('score', 'desc')->limit(3)->get();

        return view('leaderboard', compact('users'));
    }
}