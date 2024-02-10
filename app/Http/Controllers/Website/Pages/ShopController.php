<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MainCategory;
use App\Models\MyCourse;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ShopController extends Controller
{
    public function index(Request $request, CartRepository $cart)
    {
        $items = $cart->get();
        $total = $cart->total();
        $filters = $request->query();
        $minPrice = $request->input('min_price', 0); 
        $maxPrice = $request->input('max_price', 10000);
    
        $categories = Category::with('parent', 'comments')
            ->active()
            ->filter($filters)
            ->priceRange($minPrice, $maxPrice)
            ->paginate(15);
    
        $listCategories = Category::with('parent', 'comments')
            ->active()
            ->filter($filters)
            ->priceRange($minPrice, $maxPrice)
            ->paginate(4);
    
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
        $mainCategories = MainCategory::with('parent', 'comments')->get();
        return view('website.pages.shop.allCategoryShop', compact('categories', 'listCategories' , 'mainCategories'));
    }
    
    public function update(Request $request)
    {
        $value = $request->input('value');
        Cookie::queue('price_range', $value);
        $maxPrice = $value + 50;
        // $maxPrice = 1000;
        return response()->json(['maxPrice' => $maxPrice]);
    }
    public function search(Request $request)
    {
        $name = $request->input('name');

        // Retrieve categories based on the search query
        $categories = Category::active()
            ->where('name', 'LIKE', '%' . $name . '%')
            ->paginate(15);

        $listCategories = Category::active()
            ->where('name', 'LIKE', '%' . $name . '%')
            ->paginate(4);
        // You can then return the results to a view or handle them in any other way
        return view('website.pages.shop.allCategoryShop', compact('categories', 'listCategories'));
    }
}    
