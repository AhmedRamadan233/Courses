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

        $items =  $cart->get();
        $total = $cart->total();

        return response()->json(['data' => $items , 'total' => $total]);
    }

    public function store(Request $request, CartRepository $cart)
    {
        // $request->validate([
        //     'category_id' => ['required', 'integer', 'exists:categorys,id'],
        //     'quantity' => ['nullable', 'integer', 'min:1'],
        // ]);
    
        $category = Category::findOrFail($request->post('category_id'));
        $cart->add($category);
        
        return response()->json(['message' => 'Category added to cart successfully' , ]);
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
        return response()->json(['message' => 'Category removed from cart successfully']);
    }

    public function total(CartRepository $cart)
    {
        $total = $cart->total();
        return response()->json(['total' => $total]);
    }
}

