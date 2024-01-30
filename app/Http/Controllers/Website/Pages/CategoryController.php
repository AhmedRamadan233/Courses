<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Cart\CartRepository;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->query();
        $categories = Category::with('parent')->active()->filter($filters)->get();;
        return response()->json(['categories' => $categories], 200);
    }

    public function getCategoryBySlug(Request $request , $slug , CartRepository $cart)
    {
        $showCategory = Category::where('slug', $slug)->firstOrFail();
        $allRelationsWithCategory = Category::with('comments' ,'description', 'commonQestions', 'sections.quizzes', 'sections.products')->where('slug', $slug)->get();
        $items =  $cart->get();
        $total = $cart->total();
        
        return view('website.pages.course-view.course-view', compact('showCategory', 'allRelationsWithCategory' , 'items','total'));
    }

}