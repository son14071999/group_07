<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\dethi;
use App\cauhoi;
use App\cautraloi;
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
        var_dump($cautl);
        exit();
        return view('dethi.showde', compact('cauhoi','de'));
    }

    public function logout(Request $req){
    	Auth::logout();
    	return redirect('/');
    }
}
