<?php

namespace App\Http\Controllers;


use App\dethi;
use App\theloaide;
use Illuminate\Http\Request;
use Session;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class ManagerExamController extends Controller
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
    public function add_exam(Request $request){
         $this->AuthLogin();
    	$theloaide = theloaide::all();
    	return view('admins.page_manager_exam.add_exam',['theloaide'=>$theloaide]);


    }
    public function save_exam(Request $request){
         $this->AuthLogin();
    	$dethi = new dethi();
    	$dethi->tenDe = $request->tende;
    	// echo  $request->tende.'<br>';
    	// echo  $request->songuoilam.'<br>';
    	// echo  $request->dokho.'<br>';
    	// echo  $request->thoigian;

    	$dethi->tenDeKhongDau = $request->tendekhongdau;
    	$dethi->id_theLoaiDe = $request->theloaide;
    	$dethi->mon = $request->mon;
    	$dethi->nam = $request->lop;
    	$dethi->kieuDe = $request->kieude;
    	$dethi->soNguoiLam = $request->songuoilam;
    	$dethi->doKho = $request->dokho;
    	$dethi->thoiGian = $request->thoigian;
    	$dethi->save();
    	//  echo  $dethi->tenDe.'<br>';
    	//  echo  $dethi->soNguoiLam.'<br>';
    	// echo  $dethi->doKho.'<br>';
    	//  echo  $dethi->thoiGian;
    	Session::put('massage',' add  exam success!');
        return Redirect::to('/all-exam');
    }

    public function edit_exam($dethi_id){
         $this->AuthLogin();
    	$dethi = dethi::where('id',$dethi_id)->get();
        $theloaide = theloaide::all();
    	return view('admins.page_manager_exam.edit_exam',['dethi'=>$dethi, 'theloaide'=>$theloaide]);
    }

    public function update_exam(Request $request, $dethi_id){
         $this->AuthLogin();
    	$dethi = dethi::find($dethi_id);
    	$dethi->tenDe = $request->tende;
        

        $dethi->tenDeKhongDau = $request->tendekhongdau;
        $dethi->id_theLoaiDe = $request->theloaide;
        $dethi->mon = $request->mon;
        $dethi->nam = $request->lop;
        $dethi->kieuDe = $request->kieude;
        $dethi->soNguoiLam = $request->songuoilam;
        $dethi->doKho = $request->dokho;
        $dethi->thoiGian = $request->thoigian;
        $dethi->save();
        Session::put('massage',' update  exam success!');
        return Redirect::to('/all-exam');
    }

     public function delete_exam( $dethi_id){
         $this->AuthLogin();
    	$dethi = dethi::find($dethi_id);
    	
    	$dethi->delete();
    	Session::put('massage',' delete exam success!');
        return Redirect::to('/all-exam');
    }

    public function all_exam(){
         $this->AuthLogin();
    	$dethi = dethi::paginate(5);
    	$theloaide = theloaide::all();
    	return view('admins.page_manager_exam.all_exam',['dethi'=> $dethi,'theloaide'=>$theloaide]);
    }





    public function demo(){
    	$dethi = new dethi();
    	
    	//return view('admins.page_manager_exam.edit_exam',['getdethiById'=>$getdethiById]);
    }

}
