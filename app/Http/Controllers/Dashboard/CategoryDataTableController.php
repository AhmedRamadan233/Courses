<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // display data in category page
    public function index(Request $request)
    {
        $status = $request->input('status');

        if ($request->ajax()) {
            $categories = Category::with('parent')
                ->when($status, function ($query) use ($status) {
                    return $query->filters($status);
                })
                ->get();
            return DataTables::of($categories)
                ->addIndexColumn()
                ->addColumn('parent_name', function ($row) {
                    return $row->parent ? $row->parent->name : '-';
                }) 
                // ->addColumn('instractor_name', function ($row) {
                //     return $row->instructor ? $row->instructor->name : '-';
                // })
                ->addColumn('actions', function ($row) {
                    return '<div class="btn-group">
                                <button class="btn btn-sm btn-primary ml-2" data-id="'.$row['id'].'" id="editCategory">Edit</button>
                                <button class="btn btn-sm btn-danger ml-2" data-id="'.$row['id'].'" id="deleteCategory">Delete</button>
                            </div>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('dashboard.pages.categories.index');
    }
    // display all categories in add category model to select parent categories
    public function create()
    {
        $parentCategories = Category::with('parent')->get();
        // $instructors = Category::with('instructor')->get();
        return response()->json(['details' => $parentCategories ]);
    }
    // to save a new category in db
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|unique:categories',
            'parent_id' => 'nullable|exists:categories,id',
            // 'instructor_id' => 'nullable|exists:users,id',
            'description' => 'required',
            'price' => 'required',
            'status' => 'required|in:active,inactive,archive',
        ]);
        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->description = $request->input('description');
        $category->price = $request->input('price');
        $category->parent_id = $request->input('parent_id');
        $category->status = $request->input('status');
        $query = $category->save();
        if (!$query) {
            return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'New Category has been successfully saved']);
        }
    }
    // display all categories in edit category model to select parent categories && send data with id
    public function editCategory(Request $request)
    {
        $category_id = $request->category_id;
        $category = Category::with('parent')->find($category_id);
        $allCategories = Category::all();
        return response()->json(['details' => $category, 'allCategories' => $allCategories]);
    }
    // to update category in db
    public function updateCategory(Request $request)
    {
        $category_id = $request->cid;
        $validator = \Validator::make($request->all(), [
            'name' => 'required|unique:categories,name,' . $category_id,
            'description' => 'required',
            'status' => 'required|in:active,inactive,archive',
        ]);
        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $category = Category::find($category_id);
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->description = $request->input('description');
        $category->price = $request->input('price');
        $category->parent_id = $request->input('parent_id');
        $category->status = $request->input('status');
        $query = $category->save();
        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'Category Details have been updated']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
        }
    }
    // to delete a category
    public function deleteCategory(Request $request){
        $category_id = $request->category_id;
        $query = Category::find($category_id)->delete();
        if($query){
            return response()->json(['code'=>1, 'msg'=>'Category has been deleted from database']);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
        }
    }
    
}
