<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function getLectureByID(Request $request, $lectureId, CartRepository $cart)
    {
        $lecture = Product::findOrFail($lectureId);
        $items =  $cart->get();
        $total = $cart->total();
        return response()->json(['lecture' => $lecture]);      
    }
}
