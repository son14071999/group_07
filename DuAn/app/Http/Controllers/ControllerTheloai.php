<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\theloaide;
use Illuminate\Http\Request;
use App\dethi;
class ControllerTheloai extends Controller
{
    //
    function __construct()
    {

        $theloai = theloaide::all();
        view()->share(compact('theloai'));
    }

    function getTheloai($theLoai)
    {
         //$list_de = theloaide::all();
        $list_de = dethi::all();
////        $list_de = [];
////        foreach($list_de_ban_dau as $tl){
//            if($tl->theLoai == $theLoai){
//                $list_de = $tl->dethi();
//            }
//        }
        return view('homePage', compact('list_de'));


    }

    function getDe($de)
    {
        $list_de_ban_dau = dethi::all();
        $list_de = [];
        foreach ($list_de_ban_dau as $de){
            if($de->tenDe == Str::slug($de->tenDe)){
                $list_de[] = $de;
            }
        }
        return view('theloai.homePage', compact('list_de'));
    }
}
