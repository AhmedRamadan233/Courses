<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CommonQestionsController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DescriptionController;
use App\Http\Controllers\Dashboard\SectionController;
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

        Route::prefix('categories')->group(function () {
            Route::get('/',[CategoryController::class , 'index'])->name('category.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
            Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::post('/update/{category}', [CategoryController::class, 'update'])->name('category.update');            
            Route::delete('/destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

        });
        Route::prefix('sections')->group(function () {
            Route::get ('/', [SectionController::class , 'index'])->name('section.index');
            Route::get('/create', [SectionController::class, 'create'])->name('section.create');
            Route::post('/store', [SectionController::class, 'store'])->name('section.store');
            Route::get('/edit/{section}',   [SectionController::class, 'edit'])->name('section.edit');
            Route::post('/update/{section}', [SectionController::class, 'update'])->name('section.update');
            Route::delete('/destroy/{section}', [SectionController::class, 'destroy'])->name('section.destroy');

        });
        Route::prefix('products')->group(function () {
            Route::get ('/', [ProductController::class , 'index'])->name('product.index');
            Route::get('/create', [ProductController::class, 'create'])->name('product.create');
            Route::post('/store', [ProductController::class, 'store'])->name('product.store');
            Route::get('/edit/{product}',   [ProductController::class, 'edit'])->name('product.edit');
            Route::post('/update/{product}', [ProductController::class, 'update'])->name('product.update');
            Route::delete('/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
        });
        Route::prefix('descriptions')->group(function () {
            Route::get ('/', [DescriptionController::class , 'index'])->name('description.index');
            Route::get('/create', [DescriptionController::class, 'create'])->name('description.create');
            Route::post('/store', [DescriptionController::class, 'store'])->name('description.store');
            Route::get('/edit/{description}',   [DescriptionController::class, 'edit'])->name('description.edit');
            Route::post('/update/{description}', [DescriptionController::class, 'update'])->name('description.update');
            Route::delete('/destroy/{description}', [DescriptionController::class, 'destroy'])->name('description.destroy');
        });
        Route::prefix('common_questions')->group(function () {
            Route::get ('/', [CommonQestionsController::class , 'index'])->name('common_questions.index');
            Route::get('/create', [CommonQestionsController::class, 'create'])->name('common_questions.create');
            Route::post('/store', [CommonQestionsController::class, 'store'])->name('common_questions.store');
            Route::get('/edit/{common_questions}',   [CommonQestionsController::class, 'edit'])->name('common_questions.edit');
            Route::post('/update/{common_questions}', [CommonQestionsController::class, 'update'])->name('common_questions.update');
            Route::delete('/destroy/{common_questions}', [CommonQestionsController::class, 'destroy'])->name('common_questions.destroy');
        });
        Route::prefix('website')->group(function () {
            Route::get('/', [WebsiteController::class, 'index'])->name('website.index');
       
            Route::get('/category/{slug}', [WebsiteController::class, 'getCategoryBySlug'])->name('getCategoryBySlug');

        });
        

    });


});





























































Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
