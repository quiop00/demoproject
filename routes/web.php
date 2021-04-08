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


//-------------------- Kiểu thi  ------------------------
Route::group(['prefix' => 'slide'], function () {
    Route::get('/index', 'TlSlideController@index')->name('tl_slide.index');
    Route::get('/create', 'TlSlideController@create')->name('tl_slide.create');
    Route::post('/store', 'TlSlideController@store')->name('tl_slide.store');
    Route::get('/edit/{id}', 'TlSlideController@edit')->name('tl_slide.edit');
    Route::put('/update/{id}', 'TlSlideController@update')->name('tl_slide.update');
    Route::get('/delete/{id}', 'TlSlideController@destroy');
});