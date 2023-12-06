<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Description;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;

class DescriptionController extends Controller
{
    public function index(Request $request)
    {
        $descriptions = Description::all();
        return view('dashboard.pages.descriptions.index', compact('descriptions'));
    }


    public function create()
    {
        $descriptions = Description::with('category')->get();
        $categories = Category::with('parent')->get();
        return view('dashboard.pages.descriptions.create', compact('descriptions', 'categories'));
    }
    public function getParents($parentId)
    {
        $categories = Category::where('parent_id', $parentId)->get();
        return response()->json(['categories' => $categories]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);

        $descriptions = new Description();
        $descriptions->question = $request->input('question');
        $descriptions->answer = $request->input('answer');
        $descriptions->category_id = $request->input('category_id');            
        $descriptions->save();

        Debugbar::info($descriptions);

        return redirect()->route('description.index')->with('success', 'Descriptions added successfully.');
    }

    public function edit($id)
    {
        $editedDescription = Description::findOrFail($id);
        $descriptions = Description::with('category')->get();
        $categories = Category::whereNotNull('parent_id')->get();
       
        Debugbar::info($editedDescription);

        return view('dashboard.pages.descriptions.edit', compact('editedDescription', 'descriptions' ,'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);
    
        $descriptions = Description::findOrFail($id);
    
    
        $descriptions->question = $request->input('question');
        $descriptions->answer = $request->input('answer');
        $descriptions->category_id = $request->input('category_id');            
        $descriptions->save();
    
        Debugbar::info($descriptions);
        
        return redirect()->route('description.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        $descriptions = Description::findOrFail($id);
       
        $descriptions->delete();

        return redirect()->route('description.index')->with('success', 'Descriptions deleted successfully.');
    }
    
}
