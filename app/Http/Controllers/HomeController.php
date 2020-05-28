<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('landing');
    }

    /**
     * Show the application dashboard.
     *
     *
     */
    public function index()
    {
        User::findOrFail(auth()->id())->givePermissionTo('Admin');
        return redirect()->route('exam.index');
    }

    public function landing(){
        return view('welcome');
    }
}
