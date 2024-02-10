<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Cart\CartRepository;


use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(CartRepository $cart)
    {
        // using middleware 
        // $items =  $cart->get();
        // $total = $cart->total();

        return view('website.pages.cart.cart');

    }

    public function store(Request $request, CartRepository $cart)
    {
        $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ]);
    
        $category = Category::findOrFail($request->post('category_id'));
        $cart->add($category);
        
        return redirect()->back();
    }
    

    // public function update(Request $request, CartRepository $cart)
    // {
    //     $this->validate($request, [
    //         'category_id' => 'required|exists:categorys,id',
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     $categoryId = $request->input('category_id');
    //     $quantity = $request->input('quantity');

    //     // Get the category by its ID
    //     $category = category::findOrFail($categoryId);

    //     // Now, you can use $category->id to access the ID if needed

    //     // Update the cart with the category and quantity
    //     $cart->update($category);

    //     return response()->json(['message' => 'Category updaded to cart successfully']);
    // }

    public function destroy(CartRepository $cart , $id)
    {
        $cart->delete($id);
        return redirect()->route('cart.index');
    }

    public function total(CartRepository $cart)
    {
        $total = $cart->total();
        return response()->json(['total' => $total]);
    }
}

