<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Description;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->get();
        $categoriesWithParent = Category::whereNotNull('parent_id')->get();

        return view('dashboard.pages.websiteTest.index', compact('categories', 'categoriesWithParent'));
    }




    public function getCategoryBySlug($slug)
    {
        $showCategory = Category::where('slug', $slug)->firstOrFail();
        $categoryDescriptions = Category::with('description' , 'commonQestions')->where('slug', $slug)->get();
        return view('dashboard.pages.websiteTest.show', compact('showCategory', 'categoryDescriptions'));
    }

}