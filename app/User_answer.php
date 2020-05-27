<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_answer extends Model
{
    protected $fillable =[
        'user_id','quest_id','answer'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function quest(){
        return $this->belongsTo(Quest::class);
    }
}
