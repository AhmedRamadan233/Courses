<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\AllPayment;
use App\Models\Finshing_Order;
use App\Models\Order;
use App\Models\Order_item;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Nafezly\Payments\Classes\PaymobPayment;
use Illuminate\Http\RedirectResponse;

class CheckoutController extends Controller
{
    public function create(CartRepository $cart)
    {
        if($cart->get()->count() == 0){

            return redirect()->route('coursesWebsite.index');
        }
        $items = $cart->get();
        $total = $cart->total();
        $allPayments = AllPayment::with('images')->active()->get();
        // foreach( $allPayments as $payment)
        // if ($payment->name == 'PaymobCard'){

        //     return (new PaymobController)->paymobCheckout( 
        //         $payment->name, 
        //         4454443 , 
        //         3 
        //         ,
        //         821329
        //     );
        // }


        return view('website.pages.checkout.checkout', compact('items','total' ,'allPayments'));
    }


    public function store(Request $request, CartRepository $cart)
    {
        $items = $cart->get();
        $total = $cart->total();
        DB::beginTransaction();
        try {
                // Create a new order
                $order = Order::create([
                    'user_id' => Auth::id(),
                    'payment_method' => 'cod',
                    "total"=> $total,
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


 
                // Finshing_Order::create([
                //     'order_id' => $order->id,
                //     'category_id' => $cartItem->category_id,
                //     'user_id' => Auth::id(),
                //     'is_finishing_order' => true,
                // ]);
                DB::commit();
                $allPayments = AllPayment::with('images')->active()->get();
                foreach( $allPayments as $payment)
                if ($payment->name == 'paymob'){
                        // return (new PaymobController)->paymobCheckout($payment->name, $order->id);


                        $integration_id = env('PAYMOB_INTEGRATION_ID');
                        $iframe_id_or_wallet_number =env('PAYMOB_IFRAME_ID');
                        return (new PaymobController)->checkingOut($payment->name, $integration_id, $order->id, $iframe_id_or_wallet_number);





                }
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        return redirect()->route('coursesWebsite.index');
    }

    public function checkout_done($merchant_order_id, $payment_details): RedirectResponse
    {
        dd($merchant_order_id);
        // Process the successful checkout and update the order status, etc.
        // You can access the $merchant_order_id and $payment_details here

        // For example, you can update the order status
        $order = Order::findOrFail($merchant_order_id);
        $order->status = 'completed';
        $order->save();

        // Flash a success message
        // flash(translate('Payment Successful'))->success();

        // Redirect the user to a success page or any other desired route
        return redirect()->route('success_page');
    } 
}
