<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\theloaide;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class ManagerCategoryExamController extends Controller
{
    //
     public function AuthLogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
             return redirect('/trangchu-admin');
        }else{
            return redirect('/tk/login')->send();
        }
    }
     
    public function add_category_exam(Request $request){
         $this->AuthLogin();
    	return view('admins.page_manager_category_exam.add_category_exam');


    }
    public function save_category_exam(Request $request){
         $this->AuthLogin();
    	$theloaide = new theloaide();
    	$theloaide->theLoai = $request->tentheloai;
    	$theloaide->lop = $request->lop;
    	$theloaide->save();
    	Session::put('massage',' add category exam success!');
        return Redirect::to('/all-category-exam');
    }

    public function edit_category_exam($theloaide_id){
         $this->AuthLogin();
    	$getTheloaideById = theloaide::where('id',$theloaide_id)->get();
    	return view('admins.page_manager_category_exam.edit_category_exam',['getTheloaideById'=>$getTheloaideById]);
    }

    public function update_category_exam(Request $request, $theloaide_id){
         $this->AuthLogin();
    	$theloaide = theloaide::find($theloaide_id);
    	$theloaide->theLoai = $request->tentheloai;
    	$theloaide->lop = $request->lop;
    	$theloaide->save();
    	Session::put('massage',' update category exam success!');
        return Redirect::to('/all-category-exam');
    }

     public function delete_category_exam( $theloaide_id){
         $this->AuthLogin();
    	$theloaide = theloaide::find($theloaide_id);
    	
    	$theloaide->delete();
    	Session::put('massage',' delete category exam success!');
        return Redirect::to('/all-category-exam');
    }

    public function all_category_exam(){
         $this->AuthLogin();
    	$theloaide = theloaide::paginate(5);
    	return view('admins.page_manager_category_exam.all_category_exam',['theloaide'=> $theloaide]);
    }





    public function demo($theloaide_id){
    	$getTheloaideById = theloaide::where('id',$theloaide_id)->get();
    	$getTheloaideById1 = theloaide::find($theloaide_id)->toArray();
    	echo "<pre>";
    	print_r($getTheloaideById);
    	echo "</pre>";
    	echo "<pre>";
    	print_r($getTheloaideById1);
    	echo "</pre>";
    	//return view('admins.page_manager_category_exam.edit_category_exam',['getTheloaideById'=>$getTheloaideById]);
    }
}
