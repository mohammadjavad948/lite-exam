<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\Http\Controllers\Controller;
use http\Url;
use Illuminate\Http\Request;

class MoreOptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function show(){

    }

    public function hide(){

    }

    public function makeUrl(Exam $exam){
        return route('quiz.start',$exam->slug);
    }
}
