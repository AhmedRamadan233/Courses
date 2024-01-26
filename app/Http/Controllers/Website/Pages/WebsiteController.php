<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        return view('website.index', compact('categories','items', 'total' ));

    }




}
