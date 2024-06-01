<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Komen;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class profileController extends Controller
{
    public function profil(Request $request){
        $user = User::where('id', Auth::user()->id)->first();
        $product = Post::all();
        $following = Follower::all();
        $follower = Follower::all();
        return view('../pages/profile', ['product' => $product, 'user' => $user, 'following' => $following, 'follower' => $follower]);
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
            'gambar' => 'required', 'gambar'
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
    
    public function edit()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('pages/ediprofile', ['user' => $user]);

        // echo($user);
    }
    public function update(Request $request, $id){
        
        $gambarPath = $request->oldGambar; // Default to the old image path if no new image is uploaded
    
        if ($request->hasFile('gambar')) {
            if ($request->oldGambar) {
                Storage::delete($request->oldGambar);
            }
    
            $gambarPath = $request->file('gambar')->store('public/img');
        }
    
        $user = User::where('id', $id)->update([ 
            'gambar' => $gambarPath,
            'username' => $request->username,
            'nama' => $request->nama,
            'bio' => $request->bio
        ]);
    
        // echo($user);
        return redirect()->route('profil');
    }

    public function deleteComment($id)
    {
        $comment = Komen::findOrFail($id);

        if (auth()->id() != $comment->id_user) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $comment->delete();

        return response()->json(['success' => 'Comment deleted successfully']);
    }

}
