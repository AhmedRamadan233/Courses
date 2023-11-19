<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $status = request('status');

        if ($request->ajax()) {

            $categories = Category::when($status, function ($query) use ($status) {
                return $query->filters($status);
            })->get();

            return DataTables::of($categories)
                        ->addIndexColumn()
                        ->addColumn('actions', function($row){
                            return '<div class="btn-group">
                                        <button class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="editCountryBtn">Update</button>
                                        <button class="btn btn-sm btn-danger" data-id="'.$row['id'].'" id="deleteCountryBtn">Delete</button>
                                    </div>';
                        })
                        ->rawColumns(['actions'])
                        
                        ->make(true);
        }

        return view('dashboard.pages.categories.index');
    }
    
}
