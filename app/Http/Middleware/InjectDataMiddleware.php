<?php

namespace App\Http\Middleware;

use App\Models\Category;
use App\Models\GeneralSettings;
use App\Models\MainCategory;
use App\Repositories\Cart\CartRepository;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InjectDataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request,Closure $next): Response
    {
        $filters = $request->query();
        $categories = Category::with('parent')->active()->filter($filters)->get();
        $mainCategories = MainCategory::with('parent')->get();
        $cart = app(CartRepository::class);
        $items =  $cart->get();
        $total = $cart->total();
        $generalSettings = GeneralSettings::with('images')->first();
        view()->share('categories', $categories);
        view()->share('items', $items);
        view()->share('total', $total);
        view()->share('generalSettings', $generalSettings);
        view()->share('mainCategories', $mainCategories);
        
        return $next($request);
    }
}
