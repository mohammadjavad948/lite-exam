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

    public function show(Exam $exam){

        $this->authorize('view', $exam);

        $exam->update([
           'show' => 1
        ]);

        return redirect()->back();
    }

    public function hide(Exam $exam){

        $this->authorize('view', $exam);

        $exam->update([
           'show' => 0
        ]);

        return redirect()->back();
    }
}
