<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable =[
        'name','slug','user_id','show'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function quests(){
        return $this->hasMany(Quest::class);
    }

    public function answers(){
        return $this->hasManyThrough(Answer::class,Quest::class);
    }

    public function userAnswers(){
        return $this->hasManyThrough(User_answer::class,Quest::class);
    }
}
