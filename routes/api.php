<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login','UserController@login');
Route::post('register','UserController@register');
Route::middleware(['auth:api'])->group(function(){
    Route::get('user','UserController@index');
    Route::get('liste','ApiController@liste');
    Route::Post('logout','UserController@logout');
});

