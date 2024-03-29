<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use Illuminate\Http\Request;
use App\Traits\ImageProcessing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GeneralSettingController extends Controller
{
    use ImageProcessing;

    public function index()
    {
        $generalSettings = GeneralSettings::with('images')->get();
    
        return view('dashboard.pages.generalSettings.index', compact('generalSettings'));
    }

    public function create()
    {
        
        $generalSettings = GeneralSettings::with('images')->get();
    
        return view('dashboard.pages.generalSettings.create', compact('generalSettings'));
    }



    // public function store(Request $request)
    // {
    //     // Validate the form data
    //     $validatedData = $request->validate([
    //     'facebook_link' => 'nullable|string|max:255',
    //     'twitter_link' => 'nullable|string|max:255',
    //     'gmail_link' => 'nullable|string|max:255',
    //     'whatsapp_link' => 'nullable|string|max:255',
    //     'youtube_link' => 'nullable|string|max:255',
    //     'tiktok_link' => 'nullable|string|max:255',
    //     'descriptions' => 'nullable',
    //     'app_store_iphone_link' => 'nullable|string|max:255',
    //     'app_store_android_link' => 'nullable|string|max:255',
    //     'phone_number' => 'nullable|string|max:255',
    //     'address' => 'nullable|string|max:255',
    //     'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);
    //     $validatedData['user_id'] = Auth::id();

    //     // Create a new SlideShow instance with the validated data
    //     $generalSettings = GeneralSettings::create($validatedData);
    
        
    //     // Handle image upload and association
    //     if ($request->hasFile('images')) {
    //         foreach ($request->file('images') as $image) {
    //             // Use the saveImage method from the ImageProcessing trait
    //             $imageType = $request->input('ImageType'); // Corrected input name
    //             $imagePath = $this->saveImage($image, 'logoImages');

    //             $generalSettings->images()->create([
    //                 'src' => $imagePath,
    //                 'type' => $imageType
    //             ]);
    //         }
    //     }
    //     if ($request->hasFile('pic')) {
    //         foreach ($request->file('pic') as $image) {
    //             // Use the saveImage method from the ImageProcessing trait
    //             $imageType = str:: ($request->input('ImageType' . 'pic')); // Corrected input name
    //             $imagePath = $this->saveImage($image, 'logoImages');

    //             $generalSettings->images()->create([
    //                 'src' => $imagePath,
    //                 'type' => $imageType
    //             ]);
    //         }
    //     }
    //     if ($request->hasFile('video') && $request->file('video')->isValid()) {
    //         $video = $request->file('video');
    //         $filename = time() . '_' . $video->getClientOriginalName();

    //         $video->move('upload', $filename);
    //     }

        
    //     return redirect()->route('general_settings.index')->with('success', 'Slide Show created successfully!');
    // }



    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'facebook_link' => 'nullable|string|max:255',
            'github_link' => 'nullable|string|max:255',
            'gmail_link' => 'nullable|string|max:255',
            'whatsapp_link' => 'nullable|string|max:255',
            'linkedin_link' => 'nullable|string|max:255',
            'tiktok_link' => 'nullable|string|max:255',
            'descriptions' => 'nullable',
            'app_store_iphone_link' => 'nullable|string|max:255',
            'app_store_android_link' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'pic.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $validatedData['user_id'] = Auth::id();

        // Create a new GeneralSettings instance with the validated data
        $generalSettings = GeneralSettings::create($validatedData);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageType = $request->input('ImageType');
                $imagePath = $this->saveImage($image, 'logoImages');

                $generalSettings->images()->create([
                    'src' => $imagePath,
                    'type' => $imageType,
                ]);
            }
        }

        if ($request->hasFile('pic')) {
            foreach ($request->file('pic') as $image) {
                $imageType = Str::camel($request->input('ImageType') . 'Pic'); // Adjust input name if needed
                $imagePath = $this->saveImage($image, 'logoImages');

                $generalSettings->images()->create([
                    'src' => $imagePath,
                    'type' => $imageType,
                ]);
            }
        }

        return redirect()->route('general_settings.index')->with('success', 'General Settings created successfully!');
    }

}
