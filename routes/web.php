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


//-------------------- Slide  ------------------------
Route::group(['prefix' => 'slide'], function () {
    Route::get('/index', 'TlSlideController@index')->name('tl_slide.index');
    Route::get('/create', 'TlSlideController@create')->name('tl_slide.create');
    Route::post('/store', 'TlSlideController@store')->name('tl_slide.store');
    Route::get('/edit/{id}', 'TlSlideController@edit')->name('tl_slide.edit');
    Route::put('/update/{id}', 'TlSlideController@update')->name('tl_slide.update');
    Route::get('/delete/{id}', 'TlSlideController@destroy');
});

//-------------------- Thể loại  ------------------------
Route::group(['prefix' => 'theloai'], function () {
    Route::get('/index', 'TlTheloaiController@index')->name('tl_theloai.index');
    Route::get('/create', 'TlTheloaiController@create')->name('tl_theloai.create');
    Route::post('/store', 'TlTheloaiController@store')->name('tl_theloai.store');
    Route::get('/edit/{id}', 'TlTheloaiController@edit')->name('tl_theloai.edit');
    Route::put('/update/{id}', 'TlTheloaiController@update')->name('tl_theloai.update');
    Route::get('/delete/{id}', 'TlTheloaiController@destroy');
});

//-------------------- Tin tức  ------------------------
Route::group(['prefix' => 'tintuc'], function () {
    Route::get('/index', 'TlTintucController@index')->name('tl_tintuc.index');
    Route::get('/create', 'TlTintucController@create')->name('tl_tintuc.create');
    Route::post('/store', 'TlTintucController@store')->name('tl_tintuc.store');
    Route::get('/edit/{id}', 'TlTintucController@edit')->name('tl_tintuc.edit');
    Route::put('/update/{id}', 'TlTintucController@update')->name('tl_tintuc.update');
    Route::get('/delete/{id}', 'TlTintucController@destroy');
});