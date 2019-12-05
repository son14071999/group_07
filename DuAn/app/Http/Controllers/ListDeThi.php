<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dethi;
class ListDeThi extends Controller
{
    //
    public function lamNhieu($k){
    	$listDe = dethi::all()->sortByDesc('soNguoiLam')->take($k);
    	return view('theloaide.delamnhieu',compact('listDe'));

    }
}
