<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('task');
});

Route::group(['namespace' => 'App\Http\Controllers',],function(){

    Route::get('/', 'TodoController@index')->name('todo.index');
    Route::post('store', 'TodoController@store')->name('todo.store');
    Route::get('delete/{id}', 'TodoController@destroy')->name('todo.destroy');
    Route::get('edit/{id}', 'TodoController@edit')->name('todo.edit');
    Route::post('/', 'TodoController@update')->name('todo.update');


});


