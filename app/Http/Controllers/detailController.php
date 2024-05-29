<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class detailController extends Controller
{
    public function detailGambar(Request $request){
        return view('../pages/detailGambar');
    }

    public function explore(Request $request){
        return view('../pages/explore');
    }
}
