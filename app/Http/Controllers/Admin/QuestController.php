<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\Http\Controllers\Controller;
use App\Quest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class QuestController extends Controller
{
    protected $table = [
        ['name' => 'quest','title' => 'quest'],
        ['name' => 'answer','title' => 'answer']
    ];

    public function __construct()
    {
        $this->middleware('admin');
        $this->authorizeResource(Quest::class,'quest');
    }
    /**
     * Display a listing of the resource.
     *
     *
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
        $data = Exam::orderByDesc('id')->where('user_id',auth()->id())->get();
        return view('Admin.Quest.quest',[
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(Request $request)
    {;
        $this->validateRequest($request->all())->validate();

        session([
            'count' =>  $request->count,
            'exam_id' => $request->exam,
            'quest' => $request->quest,
        ]);

        return redirect()->route('answer.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function show(Quest $quest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function edit(Quest $quest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quest $quest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quest $quest)
    {
        //
    }

    public function validateRequest(Array $data){
        return Validator::make($data,[
            'quest' => 'required',
            'exam' => 'required|numeric',
            'count' => 'required|numeric'
        ]);
    }
}
