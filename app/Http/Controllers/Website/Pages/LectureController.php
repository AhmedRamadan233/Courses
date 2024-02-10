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
        // $items =  $cart->get();
        // $total = $cart->total();
        
        $lecture = Product::findOrFail($lectureId);
        return response()->json(['lecture' => $lecture]);      
    }
}
