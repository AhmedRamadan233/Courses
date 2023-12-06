<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Section;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        $answers = Answer::with('question')->get();
        return view('dashboard.pages.answers.index', compact('answers'));
    }


    public function create()
    {
        $categories = Category::with('parent')->get();
        return view('dashboard.pages.answers.create', compact('categories'));
    }
    public function getParents($parentId)
    {
        $categories = Category::where('parent_id', $parentId)->get();
        return response()->json(['categories' => $categories]);
    }
    
    public function getSections($categoryId)
    {
        $sections = Section::where('category_id', $categoryId)->get();
        return response()->json(['sections' => $sections]);
    }
    
    public function getQuizzes($sectionId)
    {
        $quizzes = Quiz::where('section_id', $sectionId)->get();
        return response()->json(['quizzes' => $quizzes]);
    }
    
    public function getQuestions($quizId)
    {
        $questions = Question::where('quiz_id', $quizId)->get();
        return response()->json(['questions' => $questions]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'question_id' => 'required',
            'answer' => 'required',
            'is_correct' => 'required',
        ]);
    
    
        $answers = new Answer();
        $answers->answer = $request->input('answer');
        $answers->question_id = $request->input('question_id');
        $answers->is_correct = $request->input('is_correct') === 'yes' ? 1 : 0;
        $answers->save();

        Debugbar::info($answers);

        return redirect()->route('answer.index')->with('success', 'answers added successfully.');
        
    }
    
}
