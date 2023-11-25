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
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::with('category')->get();
        return view('dashboard.pages.products.index', compact('products'));
    }



    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();
        return view('dashboard.pages.products.create', compact('products', 'categories'));
    }
    /**
     * Store a newly created resource in storage.
     */

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
    
            // Move the file to the 'upload' directory
            $video->move('upload', $filename);
    
            // Alternatively, you can use the Storage facade to store the file
            // $path = $request->file('video')->storeAs('upload', $filename, 'public');
    
            $product = new Product();
            $product->name = $request->input('name');
            $product->slug = Str::slug($request->input('slug')); // Make sure to adjust if 'slug' is part of your form
            $product->category_id = $request->input('category_id');
            $product->description = $request->input('description');
            $product->status = $request->input('status', 'active'); // Set a default value if not provided
            $product->video = $filename;
            $product->save();
    
            // Debug information
            Debugbar::info($product);
            // dd($product);
    
            // Redirect the user after saving the product
            return redirect()->route('product.index')->with('success', 'Product added successfully.');
        } else {
            // Handle invalid file
            return redirect()->back()->withErrors(['video' => 'Invalid video file.'])->withInput();
        }
    }
    

    public function edit($id)
    {
        $editedProduct = Product::findOrFail($id);
        $products = Product::with('category')->get();
        $categories = Category::get();
       

        return view('dashboard.pages.products.edit', compact('editedProduct', 'products' ,'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
