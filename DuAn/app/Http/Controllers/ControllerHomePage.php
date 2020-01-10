<?php

namespace App\Http\Controllers;

use App\dethi;
use Illuminate\Http\Request;
use App\theloaide;
class ControllerHomePage extends Controller
{
    //

    function __construct()
    {
        $list_de = dethi::all();
        view()->share(compact('list_de'));
        $theloai = theloaide::take(5)->get();
        view()->share(compact('theloai'));
    }

    function getHomePage(Request $req)
    {
        return view('homePage');
    }
}
