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
            'timer' => 'required|integer|min:0',
        ]);
    
    
        $quiz = new Quiz();
        $quiz->name = $request->input('name');
        $quiz->section_id = $request->input('section_id');
        $quiz->status = $request->input('status', 'active'); 
        $quiz->timer = $request->input('timer') * 60;

        $quiz->save();

        Debugbar::info($quiz);

        return redirect()->route('quiz.index')->with('success', 'quiz added successfully.');
        
    }


    public function edit($id)
    {
        $editQuiz = Quiz::findOrFail($id);
        $categories = Category::with('parent')->get();
        $sections = Section::all();
    
        return view('dashboard.pages.quizzes.edit', compact('editQuiz', 'sections', 'categories'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'section_id' => 'required',
            'name' => 'required|unique:products,name,' . $id, 
            'status' => 'required|in:active,inactive,archive',
            'timer' => 'required|integer|min:0',
        ]);
    
        $quiz = Quiz::findOrFail($id);
        $quiz->name = $request->input('name');
        $quiz->section_id = $request->input('section_id');

        $quiz->status = $request->input('status'); 
        $quiz->timer = $request->input('timer') * 60;


        $quiz->save();
    
        Debugbar::info($quiz);
    
        return redirect()->route('quiz.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
       
        $quiz->delete();

        return redirect()->route('quiz.index')->with('success', 'quiz deleted successfully.');
    }
    
}
