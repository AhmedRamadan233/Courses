<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quiz_id',
        'answer_id',
        'question_id',
        'true_answer',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    public function scopeWithTotalCorrectAnswers($query)
    {
        return $query
            ->select('user_id', 'quiz_id')
            ->selectRaw('SUM(answers.is_correct) as total_correct_answers')
            ->leftJoin('answers', 'solutions.answer_id', '=', 'answers.id')
            ->groupBy('user_id', 'quiz_id');
    }

    

}
