<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\FinishingQuiz;
use App\Models\Solution;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function getSolutions(CartRepository $cart)
    {
        $solutions = Solution::withTotalCorrectAnswers()
            ->with(['user', 'quiz'])
            ->get();

        $finishedQuizIds = FinishingQuiz::where('is_finished', true)
            ->where('user_id', auth()->id())
            ->exists();
        $items =  $cart->get();
        $total = $cart->total();
        return view('website.pages.quiz.solutions', compact('solutions', 'finishedQuizIds' , 'items' , 'total'));
    }
    
}
