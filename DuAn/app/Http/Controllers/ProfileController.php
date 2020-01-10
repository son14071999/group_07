<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theloaide;
use App\User;
class ProfileController extends Controller
{
    public function index($id){
    	$theloai = theloaide::take(7)->get();
    	$user = User::find($id);
    	return view('forum.profile', compact('theloai','user'));
    }
}
