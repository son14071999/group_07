<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\dethi;
use App\cauhoi;
use App\cautraloi;
use App\luukq;
class ControllerDethi extends Controller
{
    //
   
    public function showde($idDe){
        $de = dethi::find($idDe)->first();
    	$cauhoi = dethi::find($idDe)->cauhoi()->get();
        $cautl = array();
        foreach ($cauhoi as $ch) {
            $cautl[] = cauhoi::find($ch->id)->cautraloi()->get();
            # code...
        }
        // tạo kq tạm thời
        // $kq = new luukq();
        // $dapan = array();
        // foreach ($cautl as $tls) {
        //     foreach ($tls as $tl) {
        //         # code...
        //         if($tl['trangThai']==1){
        //             $dapan[] = $tl['maCTL'];
        //         }
        //     }
        // }
        // $dapan = implode(' ',$dapan);
        // echo $dapan; 
        // $kq->thoigian = $de->thoiGian;
        // $kq->maDe = $de->id;
        // $kq->kq = $dapan; 
        // $kq->save();
        // exit();
        return view('dethi.showde', compact('cauhoi','de','cautl'));
    }

    // public function xuly(Request $req){
    //     var_dump($de);
    // }

    public function xuly(Request $req){
        // foreach ($req as $key => $value) {
        //     # code...
        //     echo $key;
        //     var_dump($value);
        //     echo '<br /><br /><br /><hr />';
        // }
        $kq = array();
        foreach ($req->request as $key => $value) {
            # code...
            // if(is_int($key)){
                $kq[$key] = $value;
            // }
        }
        var_dump($kq);

    }
}
