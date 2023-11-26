<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function delete($filename, $directory)
    {
        $storagePath = storage_path('app/' . $directory . '/' . $filename);
        $publicPath = public_path($directory . '/' . $filename);

        try {
            // Check if the file exists before attempting to delete it from storage
            if (Storage::exists($storagePath)) {
                Storage::delete($storagePath);
            }

            // Check if the file exists in the public directory and delete it
            if (file_exists($publicPath)) {
                unlink($publicPath);
            }
        } catch (\Exception $e) {
            // Log or dd the exception message
            dd($e->getMessage());
        }
    }
    public function index(Request $request)
    {
        $categories = Category::with('parent')->get();
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
            'description' => 'required',
            'price' => 'required', // Add validation for 'price' if needed
            'video' => 'nullable|mimetypes:video/mp4,video/quicktime|max:20480',
            'status' => 'required',
        ]);

        // Check if the request has a valid file
        if ($request->hasFile('video') && $request->file('video')->isValid()) {
            $video = $request->file('video');
            $filename = time() . '_' . $video->getClientOriginalName();

            // Move the file to the 'upload' directory
            $video->move('upload', $filename);
        } else {
            $filename = null; // Set to null if no valid video file is provided
        }

        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name')); 
        $category->parent_id = $request->input('parent_id');
        $category->description = $request->input('description');
        $category->price = $request->input('price');
        $category->status = $request->input('status');
        $category->video = $filename;
        $category->save();

        // Debug information
        Debugbar::info($category);

        return redirect()->route('category.index')->with('success', 'Category added successfully.');
    }

    public function edit($id)
    {
        $editCategory = Category::findOrFail($id);
        $categories = Category::whereNull('parent_id')->get();
        Debugbar::info($categories);

        return view('dashboard.pages.categories.edit', compact( 'editCategory','categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required', 
            'video' => 'nullable|mimetypes:video/mp4,video/quicktime|max:20480',
            'status' => 'required',
        ]);
    
        $category = Category::findOrFail($id);
    
        if ($request->hasFile('video') && $request->file('video')->isValid()) {
            if ($category->video) {
                $this->delete($category->video, 'upload');
            }
    
            $video = $request->file('video');
            $filename = time() . '_' . $video->getClientOriginalName();
    
            $video->move('upload', $filename);

            $category->video = $filename;
        }
    
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name')); 
        $category->parent_id = $request->input('parent_id');
        $category->description = $request->input('description');
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
            $this->delete($category->video, 'upload');
        }
        $category->delete();

        return redirect()->route('category.index')->with('success', 'category deleted successfully.');
    }
}
