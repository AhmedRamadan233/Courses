<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CommonQestions;
use Illuminate\Http\Request;

class CommonQestionsController extends Controller
{
    public function index(Request $request)
    {
        $commonQestions = CommonQestions::all();
        return view('dashboard.pages.commonQestions.index', compact('commonQestions'));
    }
}
