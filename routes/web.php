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
use App\Http\Controllers\Dashboard\Shared\CreateSharedController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\WebsiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\Pages\CategoryController as WebsiteCategoryController;
use App\Http\Controllers\Website\Pages\WebsiteController as WebsitePagesController;
use App\Http\Controllers\Website\Pages\QuizController as WebsiteQuizController;
use App\Http\Controllers\Website\Pages\QuestionController as WebsiteQuestionController;
use App\Http\Controllers\Website\Pages\AnswerController as WebsiteAnswerController;
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
            
            Route::post('/store', [QuizController::class, 'store'])->name('quiz.store');
            Route::get('/edit/{quiz}',   [QuizController::class, 'edit'])->name('quiz.edit');
            Route::post('/update/{quiz}', [QuizController::class, 'update'])->name('quiz.update');
            Route::delete('/destroy/{quiz}', [QuizController::class, 'destroy'])->name('quiz.destroy');
        });
        Route::prefix('questions')->group(function () {
            Route::get ('/', [QuestionController::class , 'index'])->name('question.index');
            Route::get('/create', [QuestionController::class, 'create'])->name('question.create');
            Route::post('/store', [QuestionController::class, 'store'])->name('question.store');
            Route::get('/edit/{question}',   [QuestionController::class, 'edit'])->name('question.edit');
            Route::post('/update/{question}', [QuestionController::class, 'update'])->name('question.update');
            Route::delete('/destroy/{question}', [QuestionController::class, 'destroy'])->name('question.destroy');
        });
        Route::prefix('answers')->group(function () {
            Route::get('/', [AnswerController::class, 'index'])->name('answer.index');
            Route::get('/create', [AnswerController::class, 'create'])->name('answer.create');
            Route::post('/store', [AnswerController::class, 'store'])->name('answer.store');
            Route::get('/edit/{answer}',   [AnswerController::class, 'edit'])->name('answer.edit');
            Route::post('/update/{answer}', [AnswerController::class, 'update'])->name('answer.update');
            Route::delete('/destroy/{answer}', [AnswerController::class, 'destroy'])->name('answer.destroy');
        });

        Route::prefix('shared')->group(function () {
            Route::get('/get_parents/{parentId}', [CreateSharedController::class, 'getParents'])->name('shared.get_parents');
            Route::get('/get_sections/{categoryId}', [CreateSharedController::class, 'getSections'])->name('shared.get_sections');
            Route::get('/get_quizzes/{sectionId}', [CreateSharedController::class, 'getQuizzes'])->name('shared.get_quizzes');
            Route::get('/get_questions/{quizId}', [CreateSharedController::class, 'getQuestions'])->name('shared.get_questions');
        });
        Route::prefix('website')->group(function () {
            Route::get('/', [WebsiteController::class, 'index'])->name('website.index');
       
            Route::get('/category/{slug}', [WebsiteController::class, 'getCategoryBySlug'])->name('getCategoryBySlug');
            Route::get('/section/{slug}', [WebsiteController::class, 'getSectionBySlug'])->name('getSectionBySlug');

        });
    });
    // -----------------------------------------------------------------------
    Route::get('/web', function(){
        return view('website.index');
    });
   
    Route::get('/test',function(){
        return view('website.pages.tests.tests');
    });


    // --------------------------------------
    Route::prefix('website')->group(function () {
        
        Route::prefix('courses')->group(function () {
            Route::get('/', [WebsitePagesController::class, 'index'])->name('coursesWebsite.index');
            // Route::get('/section/{slug}', [WebsitePagesController::class, 'getSectionBySlug'])->name('getSectionBySlug');
        });
        Route::prefix('categories')->group(function () {
            Route::get('/',[WebsiteCategoryController::class , 'index']);
            Route::get('/category/{slug}', [WebsiteCategoryController::class, 'getCategoryBySlug'])->name('category.getCategoryBySlug');

        });
            // quizWebsite.index
        Route::prefix('quizes')->group(function () {
            Route::get('/', [WebsiteQuizController::class, 'index'])->name('quizWebsite.index');
            Route::get('/quiz/{id}', [WebsiteQuizController::class, 'getQuizById'])->name('quizWebsite.getQuizById');
            Route::post('/save-in-cookie-and-do-next/{id}', [WebsiteQuizController::class, 'saveInCookieAndDoNext'])->name('quizWebsite.saveInCookieAndDoNext');
            // Route::get('/next-question/{id}', [WebsiteQuizController::class, 'nextQuestion'])->name('quizWebsite.nextQuestion');

            Route::post('/save-cookie-data-to-database', [WebsiteQuizController::class, 'saveCookieDataToDatabase'])->name('quizWebsite.saveCookieDataToDatabase');
            Route::get( '/solutions', [WebsiteQuizController::class, 'getSolutions'])->name('quizWebsite.getSolutions');

        });





        Route::prefix('question')->group(function () {
            Route::get('/', [WebsiteQuestionController::class, 'index'])->name('questionWebsite.index');
            // Route::get('/category/{slug}', [WebsitePagesController::class, 'getCategoryBySlug'])->name('getCategoryBySlug');
            // Route::get('/section/{slug}', [WebsitePagesController::class, 'getSectionBySlug'])->name('getSectionBySlug');
        });
        Route::prefix('answer')->group(function () {
            Route::get('/{id}', [WebsiteQuestionController::class, 'index'])->name('answerWebsite.index');
            // Route::get('/category/{slug}', [WebsitePagesController::class, 'getCategoryBySlug'])->name('getCategoryBySlug');
            // Route::get('/section/{slug}', [WebsitePagesController::class, 'getSectionBySlug'])->name('getSectionBySlug');
        });
    });
    


});





























































Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
