<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\SlideShow;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageProcessing;

class SlideShowController extends Controller
{
    use ImageProcessing;

    // public function index()
    // {
    //     $slidesShows = SlideShow::with('images')->get();

    //     // Fetch images for each SlideShow
    //     foreach ($slidesShows as $slideShow) {
    //         // Output debugging information
    //         dd($slideShow->images);
    //     }
    //     return view('dashboard.pages.slideShow.index', compact('slidesShows'));
    // }


    public function index()
    {
        $slideShows = SlideShow::with('images')->get();
    
        return view('dashboard.pages.slideShow.index', compact('slideShows'));
    }

    public function create()
    {
        $slideShows = SlideShow::with('images')->get();

        return view('dashboard.pages.slideShow.create' , compact('slideShows'));
    }


    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Create a new SlideShow instance with the validated data
        $slideShow = SlideShow::create($validatedData);
    
        // Handle image upload and association
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Use the saveImage method from the ImageProcessing trait
                $imagePath = $this->saveImage($image, 'slideShowImages');

                $slideShow->images()->create([
                    'src' => $imagePath,
                    'type' => Str::slug($slideShow->title),
                ]);
            }
        }
    
        return redirect()->route('slides_show.index')->with('success', 'Slide Show created successfully!');
    }

}
