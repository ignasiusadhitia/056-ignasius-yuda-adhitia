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
        $questions = Question::whereDoesntHave('userAnswers', function ($query) {
            $query->where('user_id', auth()->id());
        })->orWhereHas('userAnswers', function ($query) {
            $query->where('user_id', auth()->id())->where('answered_correctly', false);
        })->inRandomOrder()->limit(2)->get();

        if ($questions->isEmpty()) {
            return redirect()->route('leaderboard')->with('message', 'You have answered all questions!');
        }

        $currentQuestion = $questions->first();
        $nextQuestion = isset($questions[1]) ? $questions[1] : null;

        return view('trivia', compact('currentQuestion', 'nextQuestion'));
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

        $correctAnswer = $question->answers->where('id', $request->answer_id)->first();
        $correct = $correctAnswer !== null;

        $userAnswer = UserAnswer::create([
            'user_id' => auth()->id(),
            'question_id' => $question->id,
            'answered_correctly' => $correct,
        ]);

        if ($correct) {
            $user = User::find(auth()->id());
            $user->increment('score');
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
