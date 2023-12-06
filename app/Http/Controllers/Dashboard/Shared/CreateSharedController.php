<?php

namespace App\Http\Controllers\Dashboard\Shared;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Section;
use Illuminate\Http\Request;

class CreateSharedController extends Controller
{
    public function getParents($parentId)
    {
        $categories = Category::where('parent_id', $parentId)->get();
        return response()->json(['categories' => $categories]);
    }
    
    public function getSections($categoryId)
    {
        $sections = Section::where('category_id', $categoryId)->get();
        return response()->json(['sections' => $sections]);
    }
    
    public function getQuizzes($sectionId)
    {
        $quizzes = Quiz::where('section_id', $sectionId)->get();
        return response()->json(['quizzes' => $quizzes]);
    }
    
    public function getQuestions($quizId)
    {
        $questions = Question::where('quiz_id', $quizId)->get();
        return response()->json(['questions' => $questions]);
    }
    
}
