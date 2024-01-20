<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinishingQuiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quiz_id',
        'session_id',
        'is_finished',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the quiz that was finished.
     */
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
