<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\SorularController;
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


Route::get('/home2', function () {
    return view('home2');
});

Route::get('/', [\App\Http\Controllers\AnaController::class, 'index'])->name('anasayfa');
Route::get('/quiz/detay/{slug}', [\App\Http\Controllers\AnaController::class, 'quiz_detay'])->name('quiz.detay');
Route::get('/quiz/{slug}', [\App\Http\Controllers\AnaController::class, 'quiz_katil'])->name('quiz.katil');
Route::post('/quiz/{slug}/sonuc', [\App\Http\Controllers\AnaController::class, 'quiz_sonuc'])->name('quiz.sonuc');
Route::get('/logout',[\App\Http\Controllers\AnaController::class,'logout'])->name('admin_logout');

Route::group(['middleware'=>['auth','isTeacher'],'prefix'=>'teacher'],function(){
    Route::get('dashboard',[\App\Http\Controllers\AnaController::class,'adminpanel'])->name('dashboard');
    Route::get('quizzes/{id}/detay',[QuizController::class,'show'])->whereNumber('id')->name('quizsonuc');
    Route::get('quizzes/{id}',[QuizController::class,'destroy'])->whereNumber('id')->name('quizzes.destroy');
    Route::resource('quizzes',QuizController::class);
    Route::resource('quiz/{quiz_id}/sorulars',SorularController::class);
    Route::get('quiz/{quiz_id}/sorular/{id}',[SorularController::class,'destroy'])->whereNumber('id')->name('sorulars.destroy');
});
#UserSection

Route::group(['middleware'=>['auth','isUser'],'prefix'=>'user'],function(){


});
