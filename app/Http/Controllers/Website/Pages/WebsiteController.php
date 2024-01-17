<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->query();
        $categories = Category::with('parent')->active()->filter($filters)->get();
        // return response()->json(['categories' => $categories], 200);
        return view('website.index', compact('categories'));

    }



}
