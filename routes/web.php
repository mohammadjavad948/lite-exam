<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/','/login');
Route::redirect('/home','/login')->name('home');

Route::resources([
    '/exam' => 'Admin\ExamController',
    '/quest' => 'Admin\QuestController',
    '/answer' => 'Admin\AnswerController'
]);

Auth::routes();

