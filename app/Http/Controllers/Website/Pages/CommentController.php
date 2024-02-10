<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $categorySlug)
    {
        // Retrieve category_id from the slug
        $category = Category::where('slug', $categorySlug)->first();
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->category_id = $category->id;
        $comment->comment = $request->input('comment');
        $comment->save();
    
        return response()->json(['message' => 'Comment posted successfully']);
    }
    
}

