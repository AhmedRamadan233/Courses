<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Section;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions  = Question::with('quiz')->get();
        return view('dashboard.pages.questions.index', compact('questions'));
    }

    
    public function create()
    {
        $categories = Category::with('parent')->get();
        return view('dashboard.pages.questions.create', compact('categories'));
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
    
    public function store(Request $request)
    {
        $request->validate([
            'quiz_id' => 'required',
            'body' => 'required',
        ]);
    
    
        $question = new Question();
        $question->body = $request->input('body');
        $question->quiz_id = $request->input('quiz_id');
        $question->save();

        Debugbar::info($question);

        return redirect()->route('question.index')->with('success', 'question added successfully.');
        
    }
    
    

}
