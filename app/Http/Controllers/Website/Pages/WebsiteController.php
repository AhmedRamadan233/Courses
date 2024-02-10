<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Finshing_Order;
use App\Models\GeneralSettings;
use App\Models\MainCategory;
use App\Models\SlideShow;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    public function index(Request $request , CartRepository $cart)
    {
        //make a middleware
        // $isBought = Finshing_Order::with('user')->get();
        // $isBoughtCategories = Finshing_Order::where('is_finishing_order', true)
        //     ->where('user_id', auth()->id())
        //     ->pluck('category_id')
        //     ->toArray();
        
        // dd($isBoughtCategories);

        $items =  $cart->get();
        $total = $cart->total();
        $filters = $request->query();
        $Newest =  $request->query();
        $categories = Category::with('parent' , 'comments')->active()->filter($filters)->newest(4)->get();
        $mainCategories=MainCategory::with('parent' , 'comments')->get();
        $comments = Comment::all();

        $slideShows = SlideShow::with('images')->get();
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
        // 'isBoughtCategories'
     
        return view('website.index', compact('categories','items', 'total' ,'slideShows' , 'generalSettings' , 'user' , 'descriptions' , 'comments' , 'mainCategories'));

    }




}
