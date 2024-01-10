<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions  = Question::with('quiz')->get();
        return view('website.pages.questions.question', compact('questions'));
    }
}
