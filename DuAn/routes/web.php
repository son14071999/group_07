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

Route::get('/', function () {
    return view('trangchu.trangchu');
});

Route::get('index',function(){
	return view('/block/header');
});

Route::get('signup',function(){
	return view('signup_in.signup');
})->name('signup');
Route::post('signup','Taikhoan@postSignin')->name('signup');
Route::get('login',function(){
	return view('signup_in.login');
});
Route::post('login','Taikhoan@login')->name('login');
Route::get('logout','Taikhoan@logout');
Route::get('delamnhieu/{k}','ListDeThi@lamNhieu')->name('delamnhieu');
Route::get('dethi/{idDe}','ControllerDethi@showde')->name('dethi');
