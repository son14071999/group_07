<?php

namespace App\Http\Controllers;

use App\dethi;
use App\cauhoi;
use App\cautraloi;
use App\theloaide;
use Illuminate\Http\Request;
use Session;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class ManagerQuestionController extends Controller
{
    public function add_exam(Request $request){
    	$theloaide = theloaide::all();
    	return view('admins.page_manager_exam.add_exam',['theloaide'=>$theloaide]);


    }
    public function save_exam(Request $request){
    	$dethi = new dethi();
    	$dethi->tenDe = $request->tende;
    	// echo  $request->tende.'<br>';
    	// echo  $request->songuoilam.'<br>';
    	// echo  $request->dokho.'<br>';
    	// echo  $request->thoigian;

    	$dethi->tenDeKhongDau = $request->tendekhongdau;
    	$dethi->id_theLoaiDe = $request->theloaide;
    	$dethi->mon = $request->mon;
    	$dethi->lop = $request->lop;
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
    	$dethi = dethi::where('id',$dethi_id)->get();
        $theloaide = theloaide::all();
    	return view('admins.page_manager_exam.edit_exam',['dethi'=>$dethi, 'theloaide'=>$theloaide]);
    }

    public function update_exam(Request $request, $dethi_id){
    	$dethi = dethi::find($dethi_id);
    	$dethi->tenDe = $request->tende;
        

        $dethi->tenDeKhongDau = $request->tendekhongdau;
        $dethi->id_theLoaiDe = $request->theloaide;
        $dethi->mon = $request->mon;
        $dethi->lop = $request->lop;
        $dethi->kieuDe = $request->kieude;
        $dethi->soNguoiLam = $request->songuoilam;
        $dethi->doKho = $request->dokho;
        $dethi->thoiGian = $request->thoigian;
        $dethi->save();
        Session::put('massage',' update  exam success!');
        return Redirect::to('/all-exam');
    }

     public function delete_exam( $dethi_id){
    	$dethi = dethi::find($dethi_id);
    	
    	$dethi->delete();
    	Session::put('massage',' delete exam success!');
        return Redirect::to('/all-exam');
    }

    public function all_question(){
    	$dethi = dethi::all();
    	$cauhoi = cauhoi::paginate(5);
    	$theloaide = theloaide::all();
    	$cautraloi = cautraloi::all();
    	return view('admins.page_manager_question.all_question',['dethi'=> $dethi,'theloaide'=>$theloaide,'cauhoi'=>$cauhoi, 'cautraloi', $cautraloi]);
    }


}
