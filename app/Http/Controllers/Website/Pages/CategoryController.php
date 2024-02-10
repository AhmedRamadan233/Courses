<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\GeneralSettings;
use App\Repositories\Cart\CartRepository;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->query();
        $categories = Category::with('parent')->active()->filter($filters)->get();
        return response()->json(['categories' => $categories], 200);
    }

    public function getCategoryBySlug(Request $request , $slug , CartRepository $cart)
    {
        // delete all of this after make a middleware
        // $filters = $request->query();
        // $categories = Category::with('parent')->active()->filter($filters)->get(); 
        // $items =  $cart->get();
        // $total = $cart->total();
        // $generalSettings = GeneralSettings::with('images' , 'user')->get();
        $showCategory = Category::where('slug', $slug)->firstOrFail();
        $allRelationsWithCategory = Category::with('comments' ,'description', 'commonQestions', 'sections.quizzes', 'sections.products')->where('slug', $slug)->get();
        
      
        return view('website.pages.course-view.course-view', compact('showCategory', 'allRelationsWithCategory'));
    }

}