<?php

use App\Http\Controllers\Website\Auth\LoginController;
use App\Http\Controllers\Website\Auth\RegistrationController;
use App\Http\Controllers\Website\Pages\CartController;
use App\Http\Controllers\Website\Pages\CategoryController;
use App\Http\Controllers\Website\Pages\WebsiteController;
use App\Http\Controllers\Website\Pages\WebsiteController as WebsitePagesController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('website')->group(function () {
    Route::post('register', [RegistrationController::class, 'register']);
    Route::post('login', [LoginController::class, 'login']); 
});


Route::group(['prefix' => '/website','middleware' => 'auth:sanctum'], function () {
    Route::post('logout', [LoginController::class, 'logout']);



    Route::prefix('courses')->group(function () {
        Route::get('/', [WebsiteController::class, 'index']);
        // Route::get('/category/{slug}', [WebsiteController::class, 'getCategoryBySlug'])->name('getCategoryBySlug');
        // Route::get('/section/{slug}', [WebsiteController::class, 'getSectionBySlug'])->name('getSectionBySlug');

    });

    Route::prefix('categories')->group(function () {
        Route::get('/',[CategoryController::class , 'index']);
        Route::get('/{slug}', [CategoryController::class, 'getCategoryBySlug']);

    });

    
});


Route::prefix('website')->group(function () {
    Route::prefix('courses')->group(function () {
        Route::get('/', [WebsitePagesController::class, 'index'])->name('coursesWebsite.index');
    });
    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('cart.index');
        Route::post('/store', [CartController::class, 'store'])->name('cart.store');
        // Route::put('/update', [CartController::class, 'update'])->name('cart.update');
        Route::delete('/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
        Route::get('/total', [CartController::class, 'total'])->name('cart.total');

    });
});