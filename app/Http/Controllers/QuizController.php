<?php

namespace App\Http\Controllers;

use App\Exam;
use App\User_answer;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function startQuiz(Exam $exam){
        $answer = array();
        $data = $exam->quests()->with('answers')->orderByRaw('Rand()')->get();
        $i = 1;

        foreach ($data as $d){
            $answer[$i] = $d["id"];
            $i++;
        }
        session([
           'quest_id' => $answer
        ]);

        return view('user.quiz',[
            'data' => $data
        ]);
    }

    public function save(Request $request){
        $i = 1;
        $a = null;
        foreach (session('answer') as $answer){
            $ua = $request->get('answer'.$i);

            if (null !== $ua){
                $a = $ua;
            }

            User_answer::create([
                'user_id' => auth()->id(),
                'quest_id' => $answer,
                'answer' => $a
            ]);

            $i++;
        }

        return redirect()->route('landing');
    }
}
