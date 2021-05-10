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


Route::get('user/create', 'HomeController@create');
Route::post('user/create', 'HomeController@store');

Route::get('user/index', 'HomeController@index');


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

    Route::get('/search', 'TlTheloaiController@search')->name('tl_theloai.search');
});

//-------------------- Tin tức  ------------------------
Route::group(['prefix' => 'tintuc'], function () {
    Route::get('/index', 'TlTintucController@index')->name('tl_tintuc.index');
    Route::get('/create', 'TlTintucController@create')->name('tl_tintuc.create');
    Route::post('/store', 'TlTintucController@store')->name('tl_tintuc.store');
    Route::get('/edit/{id}', 'TlTintucController@create')->name('tl_tintuc.create1');
    Route::put('/update/{id}', 'TlTintucController@update')->name('tl_tintuc.update');
    Route::get('/delete/{id}', 'TlTintucController@destroy');
});

//------- gợi ý tìm kiếm ajax ------------ 
Route::get('search', 'ProductController@getSearch');
Route::post('search/name', 'ProductController@getSearchAjax')->name('search');


Route::get('/d', 'ProductController@index');
Route::get('/search', 'ProductController@search');

Route::get('my-form','HomeController@myform');
Route::post('my-form','HomeController@myformPost');



Route::get('/admin/news', 'NewsController@index');
Route::get('/admin/news/edit/{id}', 'NewsController@edit');
Route::PATCH('/admin/news/update/{id}', 'NewsController@update');

// ajax
Route::get("/ajax", 'TeacherController@index')->name("teacher.index");
Route::get("/teacher/all", 'TeacherController@allData')->name("teacher.allData");
Route::post("/teacher/store/", 'TeacherController@storeData')->name("teacher.storeData");
Route::get("/teacher/edit/{id}", 'TeacherController@editData')->name("teacher.editData");
Route::post("/teacher/update/{id}", 'TeacherController@updateData')->name("teacher.updateData");
Route::get("/teacher/destroy/{id}", 'TeacherController@deleteData')->name("teacher.deleteData");


// m_user
Route::get("/viewmuser", 'MUserController@index')->name("m_user.index");
Route::get("/createmuser", 'MUserController@createmuser')->name("m_user.createmuser");
Route::post("/storemuser", 'MUserController@storemuser')->name("m_user.storemuser");

