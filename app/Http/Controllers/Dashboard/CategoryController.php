<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Traits\VideoProcessing;
class CategoryController extends Controller
{
    use VideoProcessing;

    
    public function index(Request $request)
    {
        $filters = $request->query();
        $categories = Category::with('parent')->filter($filters)->paginate(10);
        return view('dashboard.pages.categories.index', compact('categories'));
    }
    public function create()
    { 
        $categories = Category::whereNull('parent_id')->get();
        return view('dashboard.pages.categories.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'nullable', 
            'video' => 'nullable|mimetypes:video/mp4,video/quicktime',
            'status' => 'required',
        ]);

        if ($request->hasFile('video') && $request->file('video')->isValid()) {
            $video = $request->file('video');
            $filename = time() . '_' . $video->getClientOriginalName();

           
            $video->move('upload', $filename);
        } else {
            $filename = null; 
        }

        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name')); 
        $category->parent_id = $request->input('parent_id');
        $category->price = $request->input('price');
        $category->status = $request->input('status');
        $category->video = $filename;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category added successfully.');
    }

    public function edit($id)
    {
        $editCategory = Category::findOrFail($id);
        $categories = Category::whereNull('parent_id')->get();

        return view('dashboard.pages.categories.edit', compact( 'categories','editCategory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'nullable', 
            'video' => 'nullable|mimetypes:video/mp4,video/quicktime|max:200',
            'status' => 'required',
        ]);
    
        $category = Category::findOrFail($id);
    
        if ($request->hasFile('video') && $request->file('video')->isValid()) {
            if ($category->video) {
                $this->deleteVideo($category->video, 'upload');
            }
    
            $video = $request->file('video');
            $filename = time() . '_' . $video->getClientOriginalName();
    
            $video->move('upload', $filename);

            $category->video = $filename;
        }
    
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name')); 
        $category->parent_id = $request->input('parent_id');
       
        $category->price = $request->input('price');
        $category->status = $request->input('status');
        $category->save();
    
        Debugbar::info($category);
    
        return redirect()->route('category.index')->with('success', 'Updated successfully.');
    }
    
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category->video) {
            $this->deleteVideo($category->video, 'upload');
        }
        $category->delete();

        return redirect()->route('category.index')->with('success', 'category deleted successfully.');
    }
}
