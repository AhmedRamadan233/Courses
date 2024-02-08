<?php

namespace App\Http\Controllers\Dashboard\Payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymobController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.pages.createDataOfAllPayments.paymob.index');
    }

    public function create(Request $request)
    {
        return view('dashboard.pages.createDataOfAllPayments.paymob.create');
    }
}
