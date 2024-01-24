<?php 

namespace App\Repositories\Cart;


use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Collection ;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Cart\CartRepository;

class CartModelRepository implements CartRepository
{
    protected $items;

    public function __construct(){
        $this->items = collect([]);
    }
    public function get(): Collection
    {
        if(!$this->items->count()){
            $this->items = Cart::with('category')->get();
        }
        return $this->items;
    }

    
    public function add(Category $category)
    {
        $item = Cart::where('category_id', $category->id)->first();
    
        if (!$item) {
            $cart = Cart::create([
                'user_id' => Auth::id(),
                'category_id' => $category->id,
            ]);
            $this->get()->push($cart);
            return $cart;
        }
        return  $item;
    }
    

    // public function update( $id)
    // {
    //     Cart::where('id', '=',$id)
    //         ->update([

    //         ]);
    // }

    public function delete($id)
    {
        Cart::where('id', '=',$id)
            ->delete();
    }

    public function empty()
    {
        Cart::query()->delete();
    }

    public function total() : float
    {
        // return (float) Cart::join('categorys' , 'category.id', '=' , 'carts.category_id')
        //     ->selectRow('SUM(categorys.price * carts.quantity) as total')
        //     ->value('total');
        return $this->get()->sum(function($item){
            return $item->category->price;
        });

    }
   
        
}