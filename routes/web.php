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



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\TimeController::class, 'index'])->name('home');

Route::get('/find', [App\Http\Controllers\HomeController::class, 'find'])->name('find');

Route::get('/time/intime','App\Http\Controllers\TimeController@intime');
Route::post('/time/intime','App\Http\Controllers\TimeController@intime');
Route::post('/time/outtime','App\Http\Controllers\TimeController@outtime');

Route::post('/time/inbreak','App\Http\Controllers\TimeController@inbreak');
Route::post('/time/outbreak','App\Http\Controllers\TimeController@outbreak');

Route::get('/time/daily','App\Http\Controllers\TimeController@daily');
Route::post('/time/daily','App\Http\Controllers\TimeController@dailyResult');

Route::get('/update1', [App\Http\Controllers\HomeController::class, 'updatefind'])->name('updatefind');



Route::post('/update', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
