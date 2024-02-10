<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use App\Models\MainCategory;
use Illuminate\Http\Request;

class AbutUsController extends Controller
{
   public function index()
   {
        $generalSettings = GeneralSettings::with('images' , 'user')->get();
        foreach ($generalSettings as $setting) {
            if ($setting->user == null) {
                $descriptions = $setting->descriptions;
                $user = null;
            } else {
                $descriptions = $setting->descriptions;
                $user = $setting->user->name;  
            }
        }
        $mainCategories = MainCategory::with('parent', 'comments')->get();

        return view('website.pages.aboutUs.aboutUs' , compact('generalSettings' , 'mainCategories'));

   }
}
