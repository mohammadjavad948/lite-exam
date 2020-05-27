<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\Http\Controllers\Controller;
use App\Quest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class ExamController extends Controller
{
    protected $table = [
      ['name' => 'name','title' => 'name'],
      ['name' => 'show','title' => 'show']
    ];

    public function __construct()
    {
        $this->middleware('admin');
        $this->authorizeResource(Exam::class,'exam');
    }

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $exams = User::find(auth()->user()->id)->exams;
        return view('Admin.Exam.exam',[
            'data' => $exams,
            'table' => $this->table
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('Admin.Exam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(Request $request)
    {
        $this->validateData($request->all())->validate();
        $slug = Str::of($request->name.'-'.auth()->user()->name.'-'.now())->slug();
        Exam::create([
            'name' => $request->name,
            'slug' => $slug,
            'user_id' => auth()->id(),
            'show' => 0
        ]);
        return redirect()->route('exam.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        $quest = Quest::where('exam_id',$exam->id)->with('answers')->get();
        return response()->view('Admin.Exam.view',[
            'title' => $exam->name,
            'quest' => $quest
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        return response()->view('Admin.Exam.edit',[
           'data' => $exam
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     *
     */
    public function update(Request $request, Exam $exam)
    {
        $this->validateData($request->all())->validate();
        $slug = Str::of($request->name.'-'.auth()->user()->name.'-'.now())->slug();
        $exam->update([
            'name' => $request->name,
            'slug' => $slug
        ]);
        return redirect()->route('exam.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     *
     */
    public function destroy(Exam $exam)
    {
        $exam->answers()->delete();
        $exam->userAnswers()->delete();
        $exam->quests()->delete();
        $exam->delete();
        return redirect()->back();
    }

    public function validateData(Array $data){
        return Validator::make($data,[
            'name' => 'required|unique:App\Exam'
        ]);
    }
}
