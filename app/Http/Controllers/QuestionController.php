<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create()
    {
        $categories = Category::all();

        return view("question.create", compact("categories"));
    }
}
