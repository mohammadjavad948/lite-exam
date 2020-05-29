<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function startQuiz(Exam $exam){
        $data = $exam->quests()->with('answers')->get();

        return view('user.quiz',[
            'data' => $data
        ]);
    }
}
