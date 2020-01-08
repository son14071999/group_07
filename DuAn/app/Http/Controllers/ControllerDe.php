<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\dethi;
use App\theloaide;
use Illuminate\Http\Request;
use App\cauhoi;
class ControllerDe extends Controller
{
    //
    function __construct()
    {
        $list_de = dethi::all();
        view()->share(compact('list_de'));
        $theloai = theloaide::all();
        view()->share(compact('theloai'));
    }

    public function show_de($tenDe){
        if(Auth::check()) {
            $list_d = dethi::all();
            foreach ($list_d as $d)
                if (Str::slug($d->tenDe) == $tenDe)
                    $de = $d;
            $idDe = $de->id;
            $cauhoi = dethi::find($idDe)->cauhoi()->get();
            $cautl = array();
            foreach ($cauhoi as $ch) {
                $cautl[] = cauhoi::find($ch->id)->cautraloi()->get();
            }
            return view('dethi.showde', compact('cauhoi', 'de', 'cautl'));
        }
        else{
            return view('signup_in.login');
        }
    }
    public function xuly(Request $req)
    {
        $dem = 0;
        $idDe = $req->input('id_de');
        $cauhoi = dethi::find($idDe)->cauhoi()->get();
        $cautl = array();
        foreach ($cauhoi as $ch) {
            $cautl[$ch->id] = cauhoi::find($ch->id)->cautraloi()->where('trangThai',1)->first();
        }
        $arr_kq = array();
//        foreach ($cautl as $tl){
//            $arr_kq[] = $tl->maCTL;
//        }
        $a = $req->request;
        $kq = array();
//        foreach ($arr_kq as $key=>$value){
//            echo "$key:  $value<br />";
//        }
        foreach($a as $key=>$value){
            echo "$key:  $value<br />";
            if(is_numeric($key)){
                $kq[$key] = $value;
                if($kq[$key]==$arr_kq[$key]){
                    $dem++;
                }

            }
         }
        print("so cau dung: $dem ");

    }

}
