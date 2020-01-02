<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/','ControllerHomePage@getHomePage')->name('home');
Route::get('tl/{theLoai}','ControllerTheloai@getTheloai')->name('theloai');
Route::get('de/{tenDe}','ControllerDe@show_de')->name('showde');
Route::get('tk/login', function(){
    return view('signup_in.login');
})->name('login');
Route::post('tk/login', 'Taikhoan@login')->name('loginn');
Route::post('xuly','ControllerDe@xuly')->name('xuly');
Route::get('logout','Taikhoan@logout')->name('logout');
