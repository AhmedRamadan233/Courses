<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Category;
use Barryvdh\Debugbar\Facades\Debugbar;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        $sections = Section::all();
        return view('dashboard.pages.sections.index', compact('sections'));
    }


    public function create()
    {
        $sections = Section::with('category')->get();
        $categories = Category::with('parent')->get();
        return view('dashboard.pages.sections.create', compact('sections', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);

        $sections = new Section();
        $sections->name = $request->input('name');
        $sections->slug = Str::slug($request->input('name')); 
        $sections->category_id = $request->input('category_id');  
        $sections->status = $request->input('status');                    
        $sections->save();

        Debugbar::info($sections);

        return redirect()->route('section.index')->with('success', 'sections added successfully.');
    }

    public function edit($id)
    {
        $editedSection = Section::findOrFail($id);
        $sections = Section::with('category')->get();
        $categories = Category::with('parent')->get();
        
        Debugbar::info($editedSection);
    
        return view('dashboard.pages.sections.edit', compact('editedSection', 'sections', 'categories'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);
    
        $sections = Section::findOrFail($id);
    
    
        $sections->name = $request->input('name');
        $sections->slug = Str::slug($request->input('name')); 
        $sections->category_id = $request->input('category_id');     
        $sections->status = $request->input('status');    
       
        $sections->save();
    
        Debugbar::info($sections);
        
        return redirect()->route('section.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        $sections = Section::findOrFail($id);
       
        $sections->delete();

        return redirect()->route('section.index')->with('success', 'sections deleted successfully.');
    }
}
