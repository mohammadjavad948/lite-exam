<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use App\Http\Controllers\Controller;
use App\Quest;
use Illuminate\Http\Request;

class AnswerController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
        $this->authorizeResource(Answer::class,'answer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('Admin.Answer.add',[
            'count' => session('count')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(Request $request)
    {
        $quest = Quest::create([
            'exam_id' => session('exam_id'),
            'quest' => session('quest'),
            'answer' => $request->right,
            'answer_count' => session('count')
        ]);

        for ($i = 1; $i <= session('count'); $i++){

            $answer = $request->get('answer'.$i);

            Answer::create([
               'answer' => $answer,
               'quest_id' => $quest->id
            ]);

        }


        return redirect()->route('quest.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
