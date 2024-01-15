<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Solution;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('section')->get();
        return view('website.pages.quiz.quiz', compact('quizzes'));
    }


    public function getQuizById($id)
    {
        $quiz = Quiz::findOrFail($id);
        $questions = $quiz->questions()->get();
    
        return view('website.pages.quiz.question', compact('quiz', 'questions'));
    }

    



    public function saveInCookieAndDoNext(Request $request, $id)
    {
        // Create a new Solution instance
        $solutions = new Solution();
        $user_id = Auth::user()->id;

        $solutions->user_id = $user_id;
        $solutions->quiz_id = $id;
    
        $selectedAnswerValue = $request->input('answer_id');
        $selectedAnswer = Answer::where('answer', '=', $selectedAnswerValue)->first();
    
        $solutions->answer_id = $selectedAnswer->id;
        $solutions->question_id = $selectedAnswer->question_id;
    
        $displayIdOfQuestion = $solutions->question_id;
        $selectAllAnswers = Answer::where('question_id', $displayIdOfQuestion)->get();
    
        foreach ($selectAllAnswers as $trueAnswer) {
            if ($trueAnswer->is_correct == 1) {
                $solutions->true_answer = $trueAnswer->answer;
            }
        }
    
        // Save data to cookie
        $cookieData = [
            'user_id' => $solutions->user_id,
            'quiz_id' => $solutions->quiz_id,
            'answer_id' => $solutions->answer_id,
            'question_id' => $solutions->question_id,
            'true_answer' => $solutions->true_answer,
        ];
    
        $cookie = Cookie::make('solutions_cookie', json_encode($cookieData));

        // $solutions->save();
    

        return response()->json(['solutions' => $solutions, 'cookie_data' => $cookieData])->withCookie($cookie);

    }
    
    

    public function nextQuestion($id)
    {
        
    }





















    public function getSolutions()
    {
        $solutions = Solution::with( 'quiz','user','question' , 'answer' )->get();
        return view('website.pages.quiz.solutions', compact('solutions'));
    }
    
    public function finishedQuiz(Request $request, $id)
    {
        $solutions = new Solution();
        $solutions->user_id = auth()->user()->id;
        $solutions->quiz_id = $id;

       
        $selectedAnswerValue = $request->input('answer_id');
        $selectedAnswer = Answer::where('answer', '=', $selectedAnswerValue)->first();
        $solutions->answer_id = $selectedAnswer->id;
        $solutions->question_id = $selectedAnswer->question_id;

        $displayIdOfQuestion= $solutions->question_id = $selectedAnswer->question_id;
        $selectAllAnswers = Answer::where('question_id',$displayIdOfQuestion)->get();
        foreach ($selectAllAnswers  as $trueAnswer){
            if($trueAnswer->is_correct == 1){
                $solutions->true_answer = $trueAnswer->answer;
            }
        }
        $solutions->save();
        

        return redirect()->back();
    }
    
    
    
}
