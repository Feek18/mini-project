<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profileController extends Controller
{
    public function profil(Request $request){
        return view('../pages/profile');
    }

    public function ediProfil(Request $request){
        return view('../pages/ediprofile');
    }

    public function notify(Request $request){
        return view('../pages/notifikasi');
    }
}
