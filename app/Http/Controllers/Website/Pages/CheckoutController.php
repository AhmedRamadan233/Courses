<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Finshing_Order;
use App\Models\Order;
use App\Models\Order_item;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function create(CartRepository $cart)
    {
        if($cart->get()->count() == 0){

            return redirect()->route('coursesWebsite.index');
        }
        $items = $cart->get();
        $total = $cart->total();

        return view('website.pages.checkout.checkout', compact('items','total'));
    }


    public function store(Request $request, CartRepository $cart)
    {
        $items = $cart->get();
        DB::beginTransaction();
        try {
                // Create a new order
                $order = Order::create([
                    'user_id' => Auth::id(),
                    'payment_method' => 'cod',
                    // Add other order-related fields here
                ]);

                foreach ($items as $cartItem) {
                    Order_item::create([
                        'order_id' => $order->id,
                        'category_id' => $cartItem->category_id,
                        'category_name' => $cartItem->category->name,
                        'price' => $cartItem->category->price,
                        'options' => $cartItem->options,
                    ]);
                }
                // dd($order);
                Finshing_Order::create([
                    'order_id' => $order->id,
                    'category_id' => $cartItem->category_id,
                    'user_id' => Auth::id(),
                    'is_finishing_order' => true,
                ]);
                DB::commit();

        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        return redirect()->route('coursesWebsite.index');
    }

}
