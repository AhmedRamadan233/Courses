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
    
        $existingData = json_decode(request()->cookie('solutions_cookie'), true) ?: [];

        $existingData = array_filter($existingData, function ($data) use ($solutions) {
            return $data['question_id'] !== $solutions->question_id;
        });
    
        $existingData[] = $cookieData;
        
        $cookie = Cookie::make('solutions_cookie', json_encode($existingData));
    
        // $solutions->save();
    
        return redirect()->back()->withCookie($cookie);
    }
    
    
    

    public function getSolutions()
    {
        $solutions = Solution::withTotalCorrectAnswers()
        ->with(['user', 'quiz'])
        ->get();


        
        return view('website.pages.quiz.solutions', compact('solutions'));
    }
   
    public function saveCookieDataToDatabase(Request $request)
    {
        $cookieData = json_decode(request()->cookie('solutions_cookie'), true) ?: [];
    
        foreach ($cookieData as $data) {
            $solutions = new Solution();
    
            $solutions->user_id = $data['user_id'];
            $solutions->quiz_id = $data['quiz_id'];
            $solutions->answer_id = $data['answer_id'];
            $solutions->question_id = $data['question_id'];
            $solutions->true_answer = $data['true_answer'];
    
            $solutions->save();
        }
    
        $cookie = Cookie::forget('solutions_cookie');
    
        return redirect()->route('quizWebsite.getSolutions')->with('success', 'question added successfully.')->withCookie($cookie);

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
