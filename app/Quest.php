<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    protected $fillable =[
        'quest','answer','exam_id','answer_count'
    ];

    public function exam(){
        return $this->belongsTo(Exam::class);
    }

    public function userAnswers(){
        return $this->hasMany(User_answer::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
