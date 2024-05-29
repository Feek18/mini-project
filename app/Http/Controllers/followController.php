<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class followController extends Controller
{
    public function following(Request $request){
        return view('../pages/following');
    }
}
