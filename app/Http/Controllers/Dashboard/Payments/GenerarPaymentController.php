<?php

namespace App\Http\Controllers\Dashboard\Payments;

use App\Http\Controllers\Controller;
use App\Models\AllPayment;
use App\Traits\ImageProcessing;
use Illuminate\Http\Request;

class GenerarPaymentController extends Controller
{
    use ImageProcessing;

    public function index()
    {
        $allPayments = AllPayment::with('images')->get();
    
        return view('dashboard.pages.allPayments.index', compact('allPayments'));
    }

    public function create()
    {
        
        $allPayments = AllPayment::with('images')->get();
    
        return view('dashboard.pages.allPayments.create', compact('allPayments'));
    }


    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'status' => 'nullable|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $allPayments = AllPayment::create($validatedData);
    
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageType = $request->input('ImageType'); 
                $imagePath = $this->saveImage($image, 'logoImages');

                $allPayments->images()->create([
                    'src' => $imagePath,
                    'type' => $imageType
                ]);
            }
        }
    
        return redirect()->route('all_payments.index')->with('success', 'Payment  created successfully!');
    }
}
