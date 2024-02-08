<?php

use App\Http\Controllers\Dashboard\AnswerController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CommonQestionsController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DescriptionController;
use App\Http\Controllers\Dashboard\GeneralSettingController;
use App\Http\Controllers\Dashboard\ImageController;
use App\Http\Controllers\Dashboard\Payments\GenerarPaymentController;
use App\Http\Controllers\Dashboard\Payments\PaymobController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\QuestionController;
use App\Http\Controllers\Dashboard\QuizController;
use App\Http\Controllers\Dashboard\Shared\CreateSharedController;
use App\Http\Controllers\Dashboard\Shared\EnvController;
use App\Http\Controllers\Dashboard\SlideShowController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\WebsiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\Pages\CategoryController as WebsiteCategoryController;
use App\Http\Controllers\Website\Pages\WebsiteController as WebsitePagesController;
use App\Http\Controllers\Website\Pages\QuizController as WebsiteQuizController;
use App\Http\Controllers\Website\Pages\QuestionController as WebsiteQuestionController;
use App\Http\Controllers\Website\Pages\AnswerController as WebsiteAnswerController;
use App\Http\Controllers\Website\Pages\CartController;
use App\Http\Controllers\Website\Pages\SolutionController as WebsiteSolutionController;
use App\Http\Controllers\Website\Pages\LectureController as WebsiteLectureController;
use App\Http\Controllers\Website\Pages\CommentController as WebsiteCommentController;
use App\Http\Controllers\Website\Pages\CheckoutController as WebsiteCheckoutController;
use App\Http\Controllers\Website\Pages\PaymobController as WebsitePaymobController;
use App\Http\Controllers\Website\Shared\SuccessController;

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


Route::prefix('/')->middleware(['auth', 'verified', 'checkRole:super_admin'])->group(function () {
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

        Route::prefix('general_settings')->group(function () {
            Route::get('/', [GeneralSettingController::class, 'index'])->name('general_settings.index');
            Route::get('/create', [GeneralSettingController::class, 'create'])->name('general_settings.create');
            Route::post('/store', [GeneralSettingController::class, 'store'])->name('general_settings.store');
            // Route::get('/edit/{answer}',   [GeneralSettingController::class, 'edit'])->name('general_settings.edit');
            // Route::post('/update/{answer}', [GeneralSettingController::class, 'update'])->name('general_settings.update');
            // Route::delete('/destroy/{answer}', [GeneralSettingController::class, 'destroy'])->name('general_settings.destroy');
        });

        Route::prefix('slides_show')->group(function () {
            Route::get('/', [SlideShowController::class, 'index'])->name('slides_show.index');
            Route::get('/create', [SlideShowController::class, 'create'])->name('slides_show.create');
            Route::post('/store', [SlideShowController::class, 'store'])->name('slides_show.store');
            // Route::get('/edit/{answer}',   [SlideShowController::class, 'edit'])->name('slides_show.edit');
            // Route::post('/update/{answer}', [SlideShowController::class, 'update'])->name('slides_show.update');
            // Route::delete('/destroy/{answer}', [SlideShowController::class, 'destroy'])->name('slides_show.destroy');
        });
        Route::prefix('images')->group(function () {
            Route::get('/', [ImageController::class, 'index'])->name('images.index');
            Route::get('/create', [ImageController::class, 'create'])->name('images.create');
            Route::post('/store', [ImageController::class, 'store'])->name('images.store');
            // Route::get('/edit/{answer}',   [SlideShowController::class, 'edit'])->name('slides_show.edit');
            // Route::post('/update/{answer}', [SlideShowController::class, 'update'])->name('slides_show.update');
            // Route::delete('/destroy/{answer}', [SlideShowController::class, 'destroy'])->name('slides_show.destroy');
        });

        Route::prefix('all_payments')->group(function () {
            Route::get('/', [GenerarPaymentController::class,'index'])->name('all_payments.index');
            Route::get('/create', [GenerarPaymentController::class, 'create'])->name('all_payments.create');
            Route::post('/store', [GenerarPaymentController::class, 'store'])->name('all_payments.store');
            // Route::get('/edit/{answer}',   [SlideShowController::class, 'edit'])->name('slides_show.edit');
            // Route::post('/update/{answer}', [SlideShowController::class, 'update'])->name('slides_show.update');
            // Route::delete('/destroy/{answer}', [SlideShowController::class, 'destroy'])->name('slides_show.destroy');
        });
        Route::prefix('paymob')->group(function () {
            Route::get('/', [PaymobController::class,'index'])->name('paymob.index');
            Route::get('/create', [PaymobController::class,'create'])->name('paymob.create');
            Route::post('/update',[EnvController::class, 'update'])->name('updateEnv');
            // Route::get('/create', [ImageController::class, 'create'])->name('images.create');
            // Route::post('/store', [ImageController::class, 'store'])->name('images.store');
            // Route::get('/edit/{answer}',   [SlideShowController::class, 'edit'])->name('slides_show.edit');
            // Route::post('/update/{answer}', [SlideShowController::class, 'update'])->name('slides_show.update');
            // Route::delete('/destroy/{answer}', [SlideShowController::class, 'destroy'])->name('slides_show.destroy');
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
});
//----------------------------------------- website -------------------------------------- 
Route::prefix('website')->middleware(['check.bought.categories'])->group(function () {
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
Route::prefix('website')->middleware(['auth', 'verified', 'checkRole:user,super_admin,student' ,'check.bought.categories'])->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/',[WebsiteCategoryController::class , 'index'])->name('categoryWebsite.index');
        Route::get('/category/{slug}', [WebsiteCategoryController::class, 'getCategoryBySlug'])->name('category.getCategoryBySlug');
    });

    Route::prefix('quizes')->group(function () {
        Route::get('/{id}', [WebsiteQuizController::class, 'index'])->name('quizWebsite.index');
        Route::get('/quiz/{id}', [WebsiteQuizController::class, 'getQuizById'])->name('quizWebsite.getQuizById');
        Route::post('/save-in-cookie-and-do-next/{id}', [WebsiteQuizController::class, 'saveInCookieAndDoNext'])->name('quizWebsite.saveInCookieAndDoNext');
        Route::post('/save-cookie-data-to-database', [WebsiteQuizController::class, 'saveCookieDataToDatabase'])->name('quizWebsite.saveCookieDataToDatabase');
    });

    Route::prefix('solutions')->group(function () {
        Route::get( '/', [WebsiteSolutionController::class, 'getSolutions'])->name('quizWebsite.getSolutions');
    });

    Route::prefix('lecture')->group(function () {
        Route::get('/{lectureId}', [WebsiteLectureController::class, 'getLectureByID'])->name('lectureWebsite.getLectureByID');
    });

    Route::prefix('comments')->group(function () {
        Route::post('/store/{categorySlug}', [WebsiteCommentController::class, 'store'])->name('commentsWebsite.store');
    });
    
    Route::prefix('checkout')->group(function () {
        Route::get('/create', [WebsiteCheckoutController::class, 'create'])->name('checkout.create');
        Route::post('/store', [WebsiteCheckoutController::class, 'store'])->name('checkout.store');

    });
    Route::prefix('success')->group(function () {
        Route::get('/email', [SuccessController::class, 'emailSuccess'])->name('email.success');
        Route::get('/payment', [SuccessController::class, 'paymentSuccess'])->name('payment.success');

    });
   
});
//----------------------------------------- user -------------------------------------- 

















Route::get('/web', function(){
    return view('website.index');
});

Route::get('/test',function(){
    return view('website.pages.tests.tests');
});












































Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/payments/verify/{payment?}',[WebsitePaymobController::class,'payment_verify'])->name('verify-payment');
Route::prefix('call_back')->group(function () {
     
    Route::get('/', [WebsitePaymobController::class, 'callback'])->name('call_back');

});

require __DIR__.'/auth.php';
