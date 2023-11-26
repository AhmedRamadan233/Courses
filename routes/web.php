<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\WebsiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('/')->middleware(['auth', 'verified'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/',[DashboardController::class , 'index'])->name('dashboard');

        // Route Categories
        Route::prefix('categories')->group(function () {
            Route::get('/',[CategoryController::class , 'index'])->name('category.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
            Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::post('/update/{category}', [CategoryController::class, 'update'])->name('category.update');            
            Route::delete('/destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

        });
        // Route products
        Route::prefix('products')->group(function () {
            Route::get ('/', [ProductController::class , 'index'])->name('product.index');
            Route::get('/create', [ProductController::class, 'create'])->name('product.create');
            Route::post('/store', [ProductController::class, 'store'])->name('product.store');
            Route::get('/edit/{product}',   [ProductController::class, 'edit'])->name('product.edit');
            Route::post('/update/{product}', [ProductController::class, 'update'])->name('product.update');
            Route::delete('/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
        });
        Route::prefix('website')->group(function () {
            Route::get('/', [WebsiteController::class, 'index'])->name('website.index');
            Route::get('/all-categories', [WebsiteController::class, 'getAllCategories'])->name('all-categories');
            Route::get('/category/{id}', [WebsiteController::class, 'getCategoryById'])->name('category');
        });
        

    });


});





























































Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
