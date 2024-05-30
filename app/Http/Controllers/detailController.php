<?php

namespace App\Http\Controllers;

use App\Models\Komen;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class detailController extends Controller
{
    public function detailGambar(Request $request, $id){
        // $posts = Post::with('user', 'comments.user')->findOrFail($id);
        $posts = Post::find($id);

        $comments = $posts->comments()->latest()->get();
        // $userComment = User::find($comments->id_user);
        $user = User::all();
        // $user = User::find($posts->user_id);
        // echo($user);
        // echo($comments);
        // echo($userComment);
        // echo($posts);
        return view('../pages/detailGambar', ['posts' => $posts, 'user' => $user, 'comment' => $comments, 'post_id' => $posts->id]);
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'komen' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);
    
        $userId = Auth::id();
        $validateData['id_user'] = $userId;
    
        Komen::create($validateData);
    
        // Redirect kembali ke halaman detail dengan menampilkan postingan dan komentar baru
        return redirect()->route('detail', ['id' => $validateData['post_id']]);
        
    }
    
    

    public function explore(Request $request){
        return view('../pages/explore');
    }
}
