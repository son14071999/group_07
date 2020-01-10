<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\dethi;
use App\theloaide;
use Illuminate\Http\Request;
use App\cauhoi;
use App\User;
use App\cautraloi;
class ControllerDe extends Controller
{
    //
    function __construct()
    {
        $list_de = dethi::all();
        view()->share(compact('list_de'));
        $theloai = theloaide::take(5)->get();
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
            // $count=0;
            // foreach ($cautl as $key => $value) {
              
            //     foreach ($value as $key => $v) {
            //         # code...
            //         if($v->trangThai==1){
            //              echo $v->maCTL.'<br>';
            //              $count++;
            //         }
                   
            //     }
            //  }
            //  echo $count;
            // echo "<pre>";
            // print_r($cautl);
            // echo "</pre>";
           return view('dethi.showde', compact('cauhoi', 'de', 'cautl'));
        }
        else{
            return view('signup_in.login');
        }
    }

    public function xuly(Request $request, $id)
    {
        $dem = 0;
        $id_de=$id;
        $count=1;
        //echo $id.'<br>';
         $cauhoi = dethi::find($id)->cauhoi()->get();

        $ctldung=array();
        $cautraloidung=array();
        //echo $request->cauhoi50;
        for ($i=1 ; $i<=count($cauhoi); $i++) {
                $cau_hoi='cauhoi'.$i;
                //echo $cau_hoi.'<br>';
                if($request->$cau_hoi){
                    $ctldung[$i] = $request->$cau_hoi;
                }else{
                    $ctldung[$i] = '0';
                }
                
            }

        $cautl = array();
            foreach ($cauhoi as $ch) {
                $cautl[] = cauhoi::find($ch->id)->cautraloi()->get();
            }
        foreach ($cautl as $key => $value) {
              
                foreach ($value as $key => $v) {
                    # code...
                    if($v->trangThai==1){
                         $cautraloidung[$count]=$v->maCTL;
                         $count++;
                         
                    }
                   
                }
             }
        for ($i=1 ; $i<=count($cauhoi); $i++) {
                //echo $cautraloidung[$i].'<br>';
            if($cautraloidung[$i]==$ctldung[$i]){
                $dem++;
            }
        }
        $user = User::find(Auth::user()->id);
        $user->score += $dem;
        $user->save();
        return view('dethi.ketquathi', compact('dem','id_de','ctldung','cautraloidung'));


            // echo "<pre>";
            // print_r($cautraloidung);
            // echo "</pre>";

        

    }

    public function showkq($id){

    }

}
