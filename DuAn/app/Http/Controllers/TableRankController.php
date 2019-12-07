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
    public function showTableRank(){
    	$user=User::orderBy('score','desc')->paginate(5);
    	return view('admins.page_ranking.table_rank')->with('users', $user);
    }
}
