<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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


    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|unique:categories',
            'description' => 'required',
            'status' => 'required|in:active,inactive,archive',
        ]);

        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        }

        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->description = $request->input('description');
        $category->status = $request->input('status');

        $query = $category->save();

        if (!$query) {
            return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'New Category has been successfully saved']);
        }
    }


    
}
