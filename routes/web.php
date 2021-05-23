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


Route::get('/',"App\Http\Controllers\catController@index")->name('index');
Route::GET('/create',"App\Http\Controllers\catController@create")->name('create');
Route::POST('/store',"App\Http\Controllers\catController@store")->name('store');
Route::get('/show',"App\Http\Controllers\catController@show")->name("show");
Route::get('/edit',"App\Http\Controllers\catController@edit")->name('edit');
Route::POST('/destroy',"App\Http\Controllers\catController@edit")->name('destroy');
