<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

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
        $questions = $quiz->questions()->paginate(1);
    
        return view('website.pages.quiz.question', compact('quiz', 'questions'));
    }
    
    // public function finished(Request $request, $id)
    // {
    //     // Assuming $id is the quiz ID
    
    //     // Step 1: Get the selected answers from the form
    //     $selectedAnswers = $request->input('answers');
    
    //     // Step 2: Compare selected answers with correct answers in the database
    //     $correctAnswers = Answer::where('is_correct', true)
    //         ->whereIn('id', $selectedAnswers)
    //         ->get();
    
    //     // Step 3: Save the results in the database
    //     foreach ($correctAnswers as $answer) {
    //         $questionId = $answer->question_id;
    
    //         // Update the is_correct column in the questions table
    //         Question::where('id', $questionId)->update(['is_correct' => true]);
    
    //         // You can also save other information related to the user's quiz attempt, if needed.
    //     }
    
    //     // Redirect or return a response as needed
    //     return view('website.pages.quiz.result', compact('quiz', 'questions'));
    // }
    
    
}
