<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Description;
use Illuminate\Http\Request;

class DescriptionController extends Controller
{
    public function index(Request $request)
    {
        $descriptions = Description::all();
        return view('dashboard.pages.descriptions.index', compact('descriptions'));
    }
}
