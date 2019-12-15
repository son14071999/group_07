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
Route::post('xuly','ControllerDethi@xuly')->name('xuly');

















// admin 

// account user
$managerUserController = 'UserController@';
Route::get('dmf',function(){
	return view('admins.page.demoform');
});
Route::get('trangchu-admin', $managerUserController.'showIndex');
Route::get('all-account', $managerUserController.'showAllAccount');

Route::get('add-account', $managerUserController.'addAccount');
Route::post('save-account', $managerUserController.'saveAccount');

Route::get('/edit-account/{user_id}', $managerUserController.'editAccount');
Route::post('update-account/{user_id}', $managerUserController.'updateAccount');
Route::get('/delete-account/{user_id}', $managerUserController.'deleteAccount');

Route::post('/search-by-name', $managerUserController.'search')->name('search');// tim gan dung 
Route::post('/search/account', $managerUserController.'search_exacly');// tim dung tuyet doi khi click vao nut tim kiem
Route::get('/search/account&keyword={keyword}', $managerUserController.'search_xuly');

Route::get('/edit-dm/{id}', function(){
	echo "sss";
});
// table rank
$managerTableRankController = 'TableRankController@';
Route::get('bang-xep-hang', $managerTableRankController.'showTableRank');

//category-exam
$managerCategroyExamController = 'ManagerCategoryExamController@';
Route::get('add-category-exam', $managerCategroyExamController.'add_category_exam');
Route::post('save-category-exam', $managerCategroyExamController.'save_category_exam');

Route::get('all-category-exam', $managerCategroyExamController.'all_category_exam');
Route::get('tttttt/{theloaide_id}', $managerCategroyExamController.'demo');

Route::get('edit-category-exam/{theloaide_id}', $managerCategroyExamController.'edit_category_exam');
Route::post('update-category-exam/{theloaide_id}', $managerCategroyExamController.'update_category_exam');

Route::get('delete-category-exam/{theloaide_id}', $managerCategroyExamController.'delete_category_exam');

//exam
$managerExamController = 'ManagerExamController@';
Route::get('add-exam', $managerExamController.'add_exam');
Route::post('save-exam', $managerExamController.'save_exam');

Route::get('all-exam', $managerExamController.'all_exam');


Route::get('edit-exam/{de_id}', $managerExamController.'edit_exam');
Route::post('update-exam/{de_id}', $managerExamController.'update_exam');

Route::get('delete-exam/{de_id}', $managerExamController.'delete_exam');
Route::get('demot', $managerExamController.'demo');

//question 
$managerQuestionController = 'ManagerQuestionController@';

Route::get('all-question', $managerQuestionController.'all_question');
Route::get('add-question', $managerQuestionController.'add_question');
Route::post('save-question', $managerQuestionController.'save_question');
Route::get('delete-question/{question_id}', $managerQuestionController.'delete_question');
//Route::post('demo', $managerQuestionController.'demo');
Route::get('edit-question/{question_id}', $managerQuestionController.'edit_question');
Route::post('update-question/{question_id}', $managerQuestionController.'update_question');

Route::post('/search/by-name', $managerQuestionController.'search');// tim gan dung 
Route::post('/search/de', $managerQuestionController.'search_exacly');// tim dung tuyet doi khi click vao nut tim kiem
Route::get('/search/de&keyword={keyword}', $managerQuestionController.'search_xuly');


