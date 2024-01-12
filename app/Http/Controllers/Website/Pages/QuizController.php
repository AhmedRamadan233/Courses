<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('section')->get();
        return view('website.pages.quiz.quiz', compact('quizzes'));
    }


    public function getQuizById($id)
    {
        $quiz = Quiz::findOrFail($id);
        $questions = $quiz->questions()->paginate(1);
    
        return view('website.pages.quiz.question', compact('quiz', 'questions'));
    }
    
    
    
}
