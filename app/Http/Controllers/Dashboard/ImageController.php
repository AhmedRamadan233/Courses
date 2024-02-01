<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        // Use the 'with' method to eager load images
        $images = Image::all();
    dd($images);
        return view('dashboard.pages.slideShow.index', compact('slidesShows'));
    }
}
