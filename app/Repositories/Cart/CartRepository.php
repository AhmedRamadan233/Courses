<?php 

namespace App\Repositories\Cart;

use App\Models\Category;
use Illuminate\Support\Collection;

interface CartRepository  
{
    public function get() : Collection;
    public function add(Category $category);
    public function delete($id);
    public function empty();
    public function total(): float;
}