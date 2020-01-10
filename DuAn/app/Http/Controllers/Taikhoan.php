<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Session;
session_start();
use DB;

class Taikhoan extends Controller
{
    //
    public function postSignin(Request $req){
    	$this->validate($req,
	    	[
		        'username' => 'required|unique:users,name',
		        'email' => 'required|email|unique:users,email',
		        'password' => 'required|min:6|max:20',
		        'password_confirmation' => 'required|same:password',
	    	],
	    	[
	    		'username.required'=>'Vui lòng nhập tên',
	    		'username.unique'=>'Tên người dùng đã tồn tại',
	    		'email.required'=>'Vui lòng nhập email',
	    		'email.email'=>'Định dạng email không phù hợp',
	    		'email.unique'=>'Email đã được sử dụng',
	    		'password.required'=>'Vui lòng nhập password',
	    		'password.min'=>'Password tối tối thiểu 6 kí tự',
	    		'password.max'=>'Password tối tối đa 20 kí tự',
	    		'password_confirmation.required'=>'Password không khớp',

	    	]
    	);
    	echo 'đăng ký thành công';
    	// echo $req->'username';
    	// echo $req->'password';
    	$user = new User();
    	$user->name=$req->username;
    	echo $req->username;
    	$user->email=$req->email;
    	echo $req->email;
    	$user->password=Hash::make($req->password);
    	$user->save();
    	return view('signup_in/login')->with('thanhcong','Tạo tài khoản thành công. Đăng nhập ngay !');

    }

    public function login(Request $req){
    	$username = $req['username'];
    	$password = $req['password'];
    	if(Auth::attempt(['name'=>$username, 'password'=>$password])){
           $req->session()->put('user', getdate()['seconds'].rand(1,1000));
    		
            $user = User::find(Auth::user()->id);
            $user->trangThai=1;
            $user->save();
            if(Auth::user()->quyen==1){
                 $req->session()->put('admin_id', getdate()['seconds'].rand(1,1000));
            }
            return redirect('/');
        }
    	else{
    		return redirect('tk/login')->with('loi','Tên đăng nhập hoặc mật khẩu sai');
        }
    }

    public function logout(Request $req){
        $user = User::find(Auth::user()->id);
        $user->trangThai=0;
        $user->save();
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
    	Auth::logout();
        $req->session()->put('user', 0);
        $req->session()->put('admin_id', 0);
        
    	return redirect('/');
    }
}
