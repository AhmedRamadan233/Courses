<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions  = Question::with('quiz')->get();
        return view('dashboard.pages.questions.index', compact('questions'));
    }
}
