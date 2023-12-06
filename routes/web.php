<?php

use App\Http\Controllers\Dashboard\AnswerController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CommonQestionsController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DescriptionController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\QuestionController;
use App\Http\Controllers\Dashboard\QuizController;
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
            Route::get('/get_parents/{parentId}', [SectionController::class, 'getParents'])->name('section.get_parents');

            Route::post('/store', [SectionController::class, 'store'])->name('section.store');
            Route::get('/edit/{section}',   [SectionController::class, 'edit'])->name('section.edit');
            Route::post('/update/{section}', [SectionController::class, 'update'])->name('section.update');
            Route::delete('/destroy/{section}', [SectionController::class, 'destroy'])->name('section.destroy');

        });
        Route::prefix('products')->group(function () {
            Route::get ('/', [ProductController::class , 'index'])->name('product.index');
            Route::get('/create', [ProductController::class, 'create'])->name('product.create');
            Route::get('/get_parents/{parentId}', [ProductController::class, 'getParents'])->name('section.get_parents');

            Route::get('/get_sections/{categoryId}', [ProductController::class, 'getSections'])->name('product.get_sections');


            Route::post('/store', [ProductController::class, 'store'])->name('product.store');
            Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
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

        Route::prefix('quizzes')->group(function () {
            Route::get ('/', [QuizController::class , 'index'])->name('quiz.index');
            Route::get('/create', [QuizController::class, 'create'])->name('quiz.create');
            Route::get('/get_sections/{categoryId}', [QuizController::class, 'getSections'])->name('quiz.get_sections');

            Route::post('/store', [QuizController::class, 'store'])->name('quiz.store');
            // Route::get('/edit/{question}',   [CommonQestionsController::class, 'edit'])->name('common_questions.edit');
            // Route::post('/update/{common_questions}', [CommonQestionsController::class, 'update'])->name('common_questions.update');
            // Route::delete('/destroy/{common_questions}', [CommonQestionsController::class, 'destroy'])->name('common_questions.destroy');
        });
        Route::prefix('questions')->group(function () {
            Route::get ('/', [QuestionController::class , 'index'])->name('question.index');
            Route::get('/create', [QuestionController::class, 'create'])->name('question.create');
            Route::get('/get_sections/{categoryId}', [QuestionController::class, 'getSections'])->name('question.get_sections');
            Route::get('/get_quizzes/{sectionId}', [QuestionController::class, 'getQuizzes'])->name('question.get_quizzes');

            Route::post('/store', [QuestionController::class, 'store'])->name('question.store');
            // Route::get('/edit/{common_questions}',   [CommonQestionsController::class, 'edit'])->name('common_questions.edit');
            // Route::post('/update/{common_questions}', [CommonQestionsController::class, 'update'])->name('common_questions.update');
            // Route::delete('/destroy/{common_questions}', [CommonQestionsController::class, 'destroy'])->name('common_questions.destroy');
        });
        Route::prefix('answers')->group(function () {
            Route::get('/', [AnswerController::class, 'index'])->name('answer.index');
            Route::get('/create', [AnswerController::class, 'create'])->name('answer.create');
            Route::get('/get_sections/{categoryId}', [AnswerController::class, 'getSections'])->name('answer.get_sections');
            Route::get('/get_quizzes/{sectionId}', [AnswerController::class, 'getQuizzes'])->name('answer.get_quizzes');
            Route::get('/get_questions/{quizId}', [AnswerController::class, 'getQuestions'])->name('answer.get_questions');
            Route::post('/store', [AnswerController::class, 'store'])->name('answer.store');
            // Route::get('/edit/{common_questions}',   [CommonQestionsController::class, 'edit'])->name('common_questions.edit');
            // Route::post('/update/{common_questions}', [CommonQestionsController::class, 'update'])->name('common_questions.update');
            // Route::delete('/destroy/{common_questions}', [CommonQestionsController::class, 'destroy'])->name('common_questions.destroy');
        });

        Route::prefix('website')->group(function () {
            Route::get('/', [WebsiteController::class, 'index'])->name('website.index');
       
            Route::get('/category/{slug}', [WebsiteController::class, 'getCategoryBySlug'])->name('getCategoryBySlug');
            Route::get('/section/{slug}', [WebsiteController::class, 'getSectionBySlug'])->name('getSectionBySlug');

        });
        

    });


});





























































Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
