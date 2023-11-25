<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{




    public function delete($filename, $directory)
    {
        $path = $directory . '/' . $filename;
    
        try {
            // Check if the file exists before attempting to delete it
            if (Storage::exists($path)) {
                Storage::delete($path);
            }
        } catch (\Exception $e) {
            // Log or dd the exception message
            dd($e->getMessage());
        }
    }
  
    public function index(Request $request)
    {
        $products = Product::with('category')->get();
        return view('dashboard.pages.products.index', compact('products'));
    }
    public function create()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();
        return view('dashboard.pages.products.create', compact('products', 'categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'video' => 'required|mimetypes:video/mp4,video/quicktime|max:20480',
            'description' => 'required',
        ]);
    
        // Check if the request has a valid file
        if ($request->hasFile('video') && $request->file('video')->isValid()) {
            $video = $request->file('video');
            $filename = time() . '_' . $video->getClientOriginalName();

            $video->move('upload', $filename);
            $product = new Product();
            $product->name = $request->input('name');
            $product->slug = Str::slug($request->input('slug')); 
            $product->category_id = $request->input('category_id');
            $product->description = $request->input('description');
            $product->status = $request->input('status', 'active'); 
            $product->video = $filename;
            $product->save();
    
            Debugbar::info($product);
    
            return redirect()->route('product.index')->with('success', 'Product added successfully.');
        } else {
            return redirect()->back()->withErrors(['video' => 'Invalid video file.'])->withInput();
        }
    }
    

    public function edit($id)
    {
        $editedProduct = Product::findOrFail($id);
        $products = Product::with('category')->get();
        $categories = Category::get();
       
        Debugbar::info($editedProduct);

        return view('dashboard.pages.products.edit', compact('editedProduct', 'products' ,'categories'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'video' => 'nullable|mimetypes:video/mp4,video/quicktime|max:20480', // Allow video to be nullable
            'description' => 'required',
            'status' => 'required|in:active,inactive,archive',
        ]);
    
        $product = Product::findOrFail($id);
    
        if ($request->hasFile('video') && $request->file('video')->isValid()) {
            if ($product->video) {
                $this->delete($product->video, 'upload');
            }
    
            $video = $request->file('video');
            $filename = time() . '_' . $video->getClientOriginalName();
    
            $video->move('upload', $filename);

            $product->video = $filename;
        }
    
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('slug')); 
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');
        $product->status = $request->input('status'); 
        $product->save();
    
        Debugbar::info($product);
    
        return redirect()->route('product.index')->with('success', 'Updated successfully.');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->video) {
            $this->delete($product->video, 'upload');
        }
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
