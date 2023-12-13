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

    public function getCategoryBySlug($slug)
    {
        $category = Category::with('description', 'commonQestions', 'sections')->where('slug', $slug)->firstOrFail();
        return response()->json(['category' => $category], 200);
    }

}