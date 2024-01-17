<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
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

    public function getCategoryBySlug(Request $request , $slug)
    {
        $showCategory = Category::where('slug', $slug)->firstOrFail();
        $allRelationsWithCategory = Category::with('description', 'commonQestions', 'sections.quizzes', 'sections.products')->where('slug', $slug)->get();

        
        return view('website.pages.course-view.course-view', compact('showCategory', 'allRelationsWithCategory'));

    }

}