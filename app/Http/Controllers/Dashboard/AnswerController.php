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
    public function index(Request $request)
    {
        $answers = Answer::with('question')->get();
        return view('dashboard.pages.answers.index', compact('answers'));
    }


    public function create()
    {
        $categories = Category::with('parent')->get();
        return view('dashboard.pages.answers.create', compact('categories'));
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


    public function edit($id)
    {
        $editAnswer = Answer::findOrFail($id);
        $categories = Category::with('parent')->get();
        $sections = Section::all();
        $quizzes = Quiz::all();
        $questions = Question::all();
        return view('dashboard.pages.answers.edit', compact('editAnswer', 'sections', 'categories' , 'quizzes' , 'questions'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'question_id' => 'required',
            'answer' => 'required',
            'is_correct' => 'required',
        ]);
    
        $answers = Answer::findOrFail($id);
        $answers->answer = $request->input('answer');
        $answers->question_id = $request->input('question_id');
        $answers->is_correct = $request->input('is_correct') === 'yes' ? 1 : 0;
        $answers->save();
    
        Debugbar::info($answers);
    
        return redirect()->route('answer.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        $answers = Answer::findOrFail($id);
       
        $answers->delete();

        return redirect()->route('answer.index')->with('success', 'answer deleted successfully.');
    }
    
}
