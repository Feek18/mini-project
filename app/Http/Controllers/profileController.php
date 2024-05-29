<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    public function profil(Request $request){
        $user = User::where('id', Auth::user()->id)->first();
        $product = Post::all();
        return view('../pages/profile', ['product' => $product, 'user' => $user]);
    }

    public function ediProfil(Request $request){
        return view('../pages/ediprofile');
    }

    public function notify(Request $request){
        return view('../pages/notifikasi');
    }

    public function posting(Request $request){
        $user = User::where('id', Auth::user()->id)->first();
        $product = Post::all();
        return view('../pages/postingan', ['product' => $product, 'user' => $user]);
    }
    public function store(Request $request){
        $gambarPath = '';

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public/img');
        }

        $validateData = $request->validate([
            'deskripsi' => 'required',
            'gambar' => 'required', 'nullable', 'gambar'
        ]);

        if ($gambarPath !== '') {
            $validateData['gambar'] = $gambarPath;
        }

        $userId = Auth::id();

        $validateData['user_id'] = $userId;

        Post::create($validateData);

        $product = Post::all(); 

        return redirect()->route('index')->with(['users' => $product, 'gambarPath' => $gambarPath]);

    }
       

}
