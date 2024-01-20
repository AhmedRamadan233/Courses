<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\FinishingQuiz;
use App\Models\Quiz;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('section')->get();

        $finishedQuizIds = FinishingQuiz::where('is_finished', true)
            ->where('user_id', auth()->id())
            ->pluck('quiz_id')
            ->toArray();

        return view('website.pages.quiz.quiz', compact('quizzes' , 'finishedQuizIds'));
    }


    public function getQuizById($id)
    {
        $quiz = Quiz::findOrFail($id);
        $questions = $quiz->questions()->get();
    
        $finishedQuizIds = FinishingQuiz::where('is_finished', true)
            ->where('user_id', auth()->id())
            ->pluck('quiz_id')
            ->toArray();
        return view('website.pages.quiz.question', compact('quiz', 'questions' , 'finishedQuizIds'));
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
    
        $finishedQuizIds = FinishingQuiz::where('is_finished', true)
            ->where('user_id', auth()->id())
            ->exists();
    
        return view('website.pages.quiz.solutions', compact('solutions', 'finishedQuizIds'));
    }
    
    
   
    public function saveCookieDataToDatabase(Request $request)
    {
        try {
            DB::beginTransaction();
    
            $cookieData = json_decode(request()->cookie('solutions_cookie'), true) ?: [];
    
            foreach ($cookieData as $data) {
                $solutions = new Solution();
    
                $solutions->user_id = $data['user_id'];
                $solutions->quiz_id = $data['quiz_id'];
                $solutions->answer_id = $data['answer_id'];
                $solutions->question_id = $data['question_id'];
                $solutions->true_answer = $data['true_answer'];
    
                $solutions->save();
    
                $finishingQuiz = new FinishingQuiz();
                $finishingQuiz->user_id = $data['user_id'];
                $finishingQuiz->quiz_id = $data['quiz_id'];
                $finishingQuiz->is_finished = true;
                $finishingQuiz->slug = Str::uuid();
                    $finishingQuiz->save();

                // Save the finishing quiz if the check passes
            }
    
            $cookie = Cookie::forget('solutions_cookie');
            DB::commit();
    
            return redirect()->route('quizWebsite.getSolutions')->with('success', 'Questions added successfully.')->withCookie($cookie);
        } catch (\Exception $e) {
            DB::rollBack();
    
            // Handle the error as needed (log, display, etc.)
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    


    
    
    
}
