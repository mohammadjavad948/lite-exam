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
Route::get('/','HomeController@landing');

Route::get('/home','HomeController@index')->name('home');

Route::resources([
    '/exam' => 'Admin\ExamController',
    '/quest' => 'Admin\QuestController',
    '/answer' => 'Admin\AnswerController'
]);

Route::get('/quiz/{exam:slug}','QuizController@startQuiz')
    ->name('quiz.start');

Route::get('/exam/show/{exam}','Admin\MoreOptionController@show')
    ->name('exam.up');

Route::get('/exam/hide/{exam}','Admin\MoreOptionController@hide')
    ->name('exam.down');


Auth::routes();

