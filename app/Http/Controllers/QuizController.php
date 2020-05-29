<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function startQuiz(Exam $exam){
        $answer = array();
        $data = $exam->quests()->with('answers')->orderByRaw('Rand()')->get();
            foreach ($data as $d){

                foreach ($d["answers"] as $a){

                }

            }
        return view('user.quiz',[
            'data' => $data
        ]);
    }
}
