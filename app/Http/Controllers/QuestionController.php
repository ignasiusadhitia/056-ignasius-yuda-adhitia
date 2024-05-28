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
    public function index(Request $request)
    {
        $query = Question::where('user_id', Auth::id());

        if ($search = $request->input('search')) {
            $query->where('question_text', 'like', "%{$search}%");
        }

        if ($category = $request->input('category')) {
            $query->where('category_id', $category);
        }

        if ($difficulty = $request->input('difficulty')) {
            $query->where('difficulty_level', $difficulty);
        }

        $questions = $query->latest()->paginate(10);
        $categories = Category::all();

        return view('questions.index', compact('questions', 'categories'));
    }

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
            'correct_answer' => 'required|integer|between:1,' . count($request->answer),
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

    public function edit(Question $question)
    {
        if ($question->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action');
        }

        $categories = Category::all();
        $answers = $question->answers;
        return view('questions.edit', compact('question', 'categories', 'answers'));
    }

    public function update(Request $request, Question $question)
    {
        if ($question->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action');
        }

        $validator = Validator::make($request->all(), [
            'question_text' => 'required|string|max:255',
            'difficulty_level' => 'required|in:easy,medium,hard',
            'answer.*' => 'required|string|max:255',
            'correct_answer' => 'required|integer|between:1,' . count($request->answer),

            function ($attribute, $request) {
                if (count($request->input($attribute)) < 2) {
                    return false;
                }
                return true;
            },
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::transaction(function () use ($request, $question) {
            $question->question_text = $request->question_text;
            $question->difficulty_level = $request->difficulty_level;
            $question->category_id = $request->category_id;
            $question->image_url = $request->image_url;
            $question->points = $question->calculatePoints($request->difficulty_level);

            $question->save();

            $question->answers()->delete();

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

        return redirect()->route('questions.index')->with('success', 'Question updated successfully');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Question deleted successfully');
    }

    public function export()
    {
        $questions = Question::where('user_id', Auth::id())->get();

        $csvFileName = 'questions.csv';
        $csvFile = fopen('php://output', 'w');

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $csvFileName . '"');

        // Add CSV header
        fputcsv($csvFile, ['Question Text', 'Category', 'Difficulty Level']);

        // Add CSV rows
        foreach ($questions as $question) {
            fputcsv($csvFile, [
                $question->question_text,
                $question->category->name,
                $question->difficulty_level,
            ]);
        }

        fclose($csvFile);
        exit();
    }
}
