<?php

namespace App\Http\Controllers\Website\Shared;

use App\Http\Controllers\Controller;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;

class SuccessController extends Controller
{
    public function emailSuccess(CartRepository $cart)
    {
        $items =  $cart->get();
        $total = $cart->total();
        return view('website.pages.success.mailSuccess', compact('items', 'total'));

    }


    public function paymentSuccess(CartRepository $cart)
    {
        $items =  $cart->get();
        $total = $cart->total();
        return view('website.pages.success.paymentSuccess', compact('items', 'total'));


    }
}
