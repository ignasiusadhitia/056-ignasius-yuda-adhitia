<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function create()
    {
        $categories = Category::all();

        return view("questions.create", compact("categories"));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question_text' => 'required|string|max:255',
            'difficulty_level' => 'required|in:easy,medium,hard',
            'answer.*' => 'required|string|max:255',
            'correct_answer' => 'required|integer|between:1' . count($request->answer),
            'image_url' => 'required_without:image|nullable|url',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::transaction(function () use ($request) {
            $question = new Question;
            $question->question_text = $request->question_text;
            $question->difficulty_level = $request->difficulty_level;
            $question->category_id = $request->category_id;
            $question->user_id = Auth::id();
            $question->image_url = $request->image_url;
            $question->points = $question->calculatePoints($request->difficulty_level);
            $question->save();

            $answers = [];

            foreach ($request->answer as $key => $answerText) {
                $answer = new Answer;
                $answer->question_id = $question->id;
                $answer->answer_text = $answerText;
                $answer->is_correct = ($key + 1) == $request->correct_answer;
                $answers[] = $answer;
            }

            $question->answers()->saveMany($answers);
        });

        return redirect()->route('questions.index')->with('success', 'Question created successfully!');
    }
}
