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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/panel', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware'=>['auth','isAdmin'],'prefix'=>'admin'],function(){
    Route::get('quizzes/{id}',[QuizController::class,'destroy'])->whereNumber('id')->name('quizzes.destroy');
    Route::resource('quizzes',QuizController::class);
    Route::resource('quiz/{quiz_id}/sorulars',\App\Http\Controllers\Admin\SorularController::class);
    #setting
    Route::get('setting', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin_setting');
    Route::post('setting/update', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin_setting_update');

});
Route::group(['middleware'=>['auth','isTeacher'],'prefix'=>'teacher'],function(){
    Route::get('quizzes/{id}',[QuizController::class,'destroy'])->whereNumber('id')->name('quizzes.destroy');
    Route::resource('quizzes',QuizController::class);
    Route::resource('quiz/{quiz_id}/sorulars',\App\Http\Controllers\Admin\SorularController::class);
});
