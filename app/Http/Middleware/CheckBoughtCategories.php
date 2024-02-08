<?php

namespace App\Http\Middleware;

use App\Models\Finshing_Order;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckBoughtCategories
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $isBoughtCategories = Finshing_Order::where('is_finishing_order', true)
            ->where('user_id', auth()->id())
            ->pluck('category_id')
            ->toArray();

            view()->share('isBoughtCategories', $isBoughtCategories);
        return $next($request);
    }
}
