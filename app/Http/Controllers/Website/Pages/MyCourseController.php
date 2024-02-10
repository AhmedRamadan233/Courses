<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MainCategory;
use App\Models\MyCourse;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;

class MyCourseController extends Controller
{
    public function index(Request $request , CartRepository $cart)
    {
        $items =  $cart->get();
        $total = $cart->total();
        $filters = $request->query();
        $categories = MyCourse::with('parent', 'comments')
            ->active()
            ->filter($filters)
            ->paginate(15);
        
        
        $listCategories = Category::with('parent', 'comments')
        ->active()
        ->filter($filters)
        ->paginate(4);
    
        $shuffledCategories = $listCategories->shuffle();
        
        foreach ($shuffledCategories as $category) {
            $itemInCart = false;
        
            foreach ($items as $item) {
                if ($item->category_id == $category->id) {
                    $itemInCart = true;
                    break;
                }
            }
        
            $category->inCart = $itemInCart;
        }

        $mainCategories = MainCategory::with('parent', 'comments')->get();
        return view('website.pages.myCourse.myCourse', compact('categories' , 'shuffledCategories' , 'mainCategories'));

    }


    public function getMyCategoryBySlug(Request $request , $slug , CartRepository $cart)
    {

        $showCategory = MyCourse::where('slug', $slug)->firstOrFail();
        $allRelationsWithCategory = MyCourse::with('parent','comments' ,'description', 'commonQestions', 'sections.quizzes', 'sections.products')->where('slug', $slug)->get();
        $mainCategories = MainCategory::with('parent', 'comments')->get();

      
      
        return view('website.pages.course-view.course-view', compact('showCategory', 'allRelationsWithCategory' , 'mainCategories'));
    }
}
