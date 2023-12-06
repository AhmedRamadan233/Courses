<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Section;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('section')->get();
        return view('dashboard.pages.quizzes.index', compact('quizzes'));
    }


    // public function create()
    // {
    //     $quizzes = Quiz::with('section')->get();
    //     $categories = Category::whereNotNull('parent_id')->with('sections')->get();
    //     $sections = Section::all();
    //     return view('dashboard.pages.quizzes.create', compact('quizzes', 'sections' ,'categories'));
    // }
    // public function getSections($categoryId)
    // {
    //     $quizzes = Quiz::with('section')->get();
    //     $categories = Category::whereNotNull('parent_id')->with('sections')->get();
    //     $sections = Section::where('category_id', $categoryId)->get();
    //     return view('dashboard.pages.quizzes.getSections', compact('quizzes', 'sections','categories'));
    // }

    // public function getQuizzes($sectionId , $categoryId)
    // {
    //     $quizzes = Quiz::with('section')->get();
    //     $categories = Category::whereNotNull('parent_id')->with('sections')->get();
    //     $sections = Section::where('category_id', $categoryId)->get();
    //     $quizzes = Quiz::where('section_id', $sectionId)->get();

    //     return view('dashboard.pages.quizzes.getSections', compact('quizzes', 'sections','categories'));
    // }












    public function create()
    {
        $categories = Category::with('parent')->get();
        return view('dashboard.pages.quizzes.create', compact('categories'));
    }




    public function store(Request $request)
    {
        $request->validate([
            'section_id' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);
    
    
        $quiz = new Quiz();
        $quiz->name = $request->input('name');
        $quiz->section_id = $request->input('section_id');
        $quiz->status = $request->input('status', 'active'); 
        $quiz->save();

        Debugbar::info($quiz);

        return redirect()->route('quiz.index')->with('success', 'quiz added successfully.');
        
    }
    
}
