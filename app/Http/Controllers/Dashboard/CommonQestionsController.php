<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CommonQestions;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;

class CommonQestionsController extends Controller
{
    public function index(Request $request)
    {
        $commonQestions = CommonQestions::all();
        return view('dashboard.pages.commonQestions.index', compact('commonQestions'));
    }


    public function create()
    {
        $commonQestions = CommonQestions::with('category')->get();
        $categories = Category::all();
        return view('dashboard.pages.commonQestions.create', compact('commonQestions', 'categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);

        $commonQestions = new CommonQestions();
        $commonQestions->question = $request->input('question');
        $commonQestions->answer = $request->input('answer');
        $commonQestions->category_id = $request->input('category_id');            
        $commonQestions->save();

        Debugbar::info($commonQestions);

        return redirect()->route('common_questions.index')->with('success', 'Common Qestions added successfully.');
    }

    public function edit($id)
    {
        $editedCommonQestions = CommonQestions::findOrFail($id);
        $commonQestions = CommonQestions::with('category')->get();
        $categories = Category::get();
       
        Debugbar::info($editedCommonQestions);

        return view('dashboard.pages.commonQestions.edit', compact('editedCommonQestions', 'commonQestions' ,'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);
    
        $commonQestions = CommonQestions::findOrFail($id);
    
    
        $commonQestions->question = $request->input('question');
        $commonQestions->question = $request->input('question');
        $commonQestions->answer = $request->input('answer');
        $commonQestions->category_id = $request->input('category_id');            
        $commonQestions->save();
    
        Debugbar::info($commonQestions);
        
        return redirect()->route('common_questions.index')->with('success', 'Updated successfully.');
    }
    public function destroy($id)
    {
        $commonQestions = CommonQestions::findOrFail($id);
        $commonQestions->delete();

        return redirect()->route('common_questions.index')->with('success', 'Common Qestions deleted successfully.');
    }
}
