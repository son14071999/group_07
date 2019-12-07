<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Hash;
use App\User;
use App\dethi;
use App\comment;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class UserController extends Controller
{
    //

    public function showIndex(){
        // thong ke so de
        $statisticExam = dethi::all()->count();
        // echo $statisticExam; 
        $statisticAccount = User::all()->count();
        $statisticComment = comment::all()->count();
        $statisticUserOnline = User::where('trangThai',1)->count();
    	return view('admins.page_manager_user.trangchu_admin',['sode'=>$statisticExam,
                                                               'sotaikhoan'=>$statisticAccount,
                                                                'socomment'=>$statisticComment,
                                                                'songuoionline'=>$statisticUserOnline]);
    }

    public function showAllAccount(){
    	//$user = new User();
    	$user=User::paginate(5);
    	//$data=0;
    	//var_dump($user);
    	// echo "<pre>";
    	// print_r($user);
    	// echo "</pre>";
    	return view('admins.page_manager_user.all_user_account', ['users' => $user]);
    }

    public function addAccount(){
    	return view('admins.page_manager_user.add_account');
    }

    public function saveAccount(Request $req){
    	$user = new User();
    	$user->name=$req->tendangnhap;
    	$user->password=Hash::make($req->pass);
    	// $user->hovaten=$req->hovaten;
    	$user->diaChi=$req->diachi;
    	$user->score=$req->diem;

    	$user->SDT=$req->dienthoai;
    	$user->email=$req->email;
    	$user->quyen=$req->quyen;
    	 $get_image = $req->file('avata');
        
        if($get_image && ($get_image->getClientOriginalExtension()=='png' || $get_image->getClientOriginalExtension()=='jpg'|| $get_image->getClientOriginalExtension()=='gif')){
            $info = getdate();
            $duoifile=$get_image->getClientOriginalExtension();
            $get_name_image = $get_image->getClientOriginalName();// lay ra ten anh lay ca duoi vi du anh1.png
            $tenImage = current(explode('.', $get_name_image)).$info['seconds']; // phan tach chuoi cach nhau dau . lay chuoi dau tien anh
            $new_image = 'anh'.$tenImage.rand(0,99).'.'.$duoifile;
            //echo $new_image;
            $link = 'admin/anhuser';
            $get_image->move($link , $new_image);
            $user->avata=$new_image;
            $user->save();
            Session::put('massage',' add account success!');
            return Redirect::to('/all-account');
        }
        $user->save();
            Session::put('massage',' add account success!');
            return Redirect::to('/all-account');

    }

    public function editAccount($user_id){
    	$user=User::where('id',$user_id)->get();
    	// echo "<pre>";
    	// print_r($user);
    	// echo "</pre>";
    	// foreach ($user as $key => $value) {
    	// 	# code...
    	// 	echo $value->email;
    	// }
    	return view('admins.page_manager_user.edit_account')->with('get_user_by_id', $user);
    }

    public function updateAccount(Request $req, $user_id){
    	$user = User::find($user_id);
    	$user->name=$req->tendangnhap;
    	$user->password=Hash::make($req->pass);
    	// $user->hovaten=$req->hovaten;
    	$user->diaChi=$req->diachi;
    	$user->score=$req->diem;

    	$user->SDT=$req->dienthoai;
    	$user->email=$req->email;
    	$user->quyen=$req->quyen;
    	 $get_image = $req->file('avata');
        
        if($get_image && ($get_image->getClientOriginalExtension()=='png' || $get_image->getClientOriginalExtension()=='jpg'|| $get_image->getClientOriginalExtension()=='gif')){
            $info = getdate();
            $duoifile=$get_image->getClientOriginalExtension();
            $get_name_image = $get_image->getClientOriginalName();// lay ra ten anh lay ca duoi vi du anh1.png
            $tenImage = current(explode('.', $get_name_image)).$info['seconds']; // phan tach chuoi cach nhau dau . lay chuoi dau tien anh
            $new_image = 'anh'.$tenImage.rand(0,99).'.'.$duoifile;
            //echo $new_image;
            $link = 'admin/anhuser';
            $get_image->move($link , $new_image);
            $user->avata=$new_image;
            $user->save();
            Session::put('massage',' update account success!');
            return Redirect::to('/all-account');
        }
       		 $user->save();
            Session::put('massage',' update account success!');
            return Redirect::to('/all-account');
    }

    public function deleteAccount($user_id){
    	$user=User::find($user_id);
    	$user->delete();
    	 Session::put('massage',' delete account success!');
            return Redirect::to('/all-account');
    }


}
