<?php

namespace App\Models;

use App\Models\Scopes\CategoryScope;
use App\Models\Scopes\QuizScope;
use App\Models\Scopes\SectionScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;



    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }
    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function solutions()
    {
        return $this->hasMany(Solution::class);
    }

    public function finishingQuiz()
    {
        return $this->hasOne(FinishingQuiz::class);
    }
}
