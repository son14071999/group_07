<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class TableRankController extends Controller
{
	  // public function AuthLogin(){
   //      $admin_id= Session::get('admin_id');
   //      if($admin_id){
   //           return redirect('/trangchu-admin');
   //      }else{
   //          return redirect('/tk/login')->send();
   //      }
   //  }
    public function showTableRank(){
    	//$this->AuthLogin();
    	$user=User::orderBy('score','desc')->paginate(5);
    	return view('admins.page_ranking.table_rank')->with('users', $user);
    }

     public function showTableRank111(){
        //$this->AuthLogin();
        $user=User::orderBy('score','desc')->paginate(5);
        return view('admins.page_ranking.table')->with('users', $user);
    }
}
