<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\GeneralSettings;
use App\Models\SlideShow;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(Request $request , CartRepository $cart)
    {
        $filters = $request->query();
        $categories = Category::with('parent')->active()->filter($filters)->get();
        $items =  $cart->get();
        $total = $cart->total();


        $slideShows = SlideShow::with('images')->get();
        $generalSettings = GeneralSettings::with('images' , 'user')->get();
        foreach ($generalSettings as $setting) {
            if ($setting->user == null) {
                $descriptions = $setting->descriptions;
                $user = null;  // Set $user to null when $setting->user is null
            } else {
                $descriptions = $setting->descriptions;
                $user = $setting->user->name;  // Accessing $setting->user->name only when $setting->user is not null
            }
        }
        foreach ($categories as $category) {
            $itemInCart = false;

            foreach ($items as $item) {
                if ($item->category_id == $category->id) {
                    $itemInCart = true;
                    break;
                }
            }

            $category->inCart = $itemInCart;
        }

     
        return view('website.index', compact('categories','items', 'total' ,'slideShows' , 'generalSettings' , 'user' , 'descriptions'));

    }




}
