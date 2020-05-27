<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable =[
      'quest_id','answer'
    ];

    public function quest(){
        return $this->belongsTo(Quest::class);
    }

}
