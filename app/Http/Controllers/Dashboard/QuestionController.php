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
    

    public function edit($id)
    {
        $editQuestion = Question::findOrFail($id);
        $categories = Category::with('parent')->get();
        $sections = Section::all();
        $quizzes = Quiz::all();
        return view('dashboard.pages.questions.edit', compact('editQuestion', 'sections', 'categories' , 'quizzes'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'quiz_id' => 'required',
            'body' => 'required',
        ]);
    
        $question = Question::findOrFail($id);
        $question->body = $request->input('body');
        $question->quiz_id = $request->input('quiz_id');
        $question->save();
    
        Debugbar::info($question);
    
        return redirect()->route('question.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
       
        $question->delete();

        return redirect()->route('question.index')->with('success', 'question deleted successfully.');
    }
    

}
