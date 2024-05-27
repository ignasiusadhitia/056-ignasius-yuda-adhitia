<?php

namespace App\Http\Controllers;


use App\Http\Requests\SubmitAnswerRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Score;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TriviaController extends Controller
{
    public function showQuestion()
    {
        $user = Auth::user();

        $answeredCorrectlyQuestionsIds = UserAnswer::where('user_id', $user->id)
            ->where('answered_correctly', true)
            ->pluck('question_id')
            ->toArray();

        $question = Question::whereNotIn('id', $answeredCorrectlyQuestionsIds)
            ->inRandomOrder()
            ->with('answers')
            ->first();

        if (!$question) {
            return redirect()->route('questions.index')->with('error', 'No more question! Add new questions!');
        }

        return view('trivia.index', compact('question'));
    }

    public function submitAnswer(Request $request)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer_id' => 'required|exists:answers,id',
        ]);

        $question = Question::find($request->question_id);
        $answer = Answer::find($request->answer_id);

        $isCorrect = $answer->is_correct;
        $points = $isCorrect ? $question->points : 0;

        UserAnswer::create([
            'user_id' => auth()->id(),
            'question_id' => $question->id,
            'answer_id' => $answer->id,
            'answered_correctly' => $isCorrect,
        ]);

        $user = auth()->user();
        $score = $user->score;


        if (!$score) {
            $score = new Score(['user_id' => $user->id, 'score' => 0]);
            $score->save();
            $user->setRelation('score', $score);
        }


        $score->score += $points;
        $score->save();

        return response()->json([
            'status' => $isCorrect ? 'Correct!' : 'Wrong answer!',
            'isCorrect' => $isCorrect
        ]);
    }


    public function showLeaderboard()
    {
        $scores = Score::with('user')->orderByDesc('score')->take(10)->get();

        $user = auth()->user();

        $userRank = null;

        if ($user) {
            $userScore = $user->score ? $user->score->score : 0;

            $userRank = Score::where('score', '>', $userScore)->count() + 1;
        }

        return view('leaderboard', compact('scores', 'userRank'));
    }
}
