<?php

namespace App\Http\Controllers;

use App\Models\Komen;
use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class detailController extends Controller
{
    public function detailGambar(Request $request, $id){
        // $posts = Post::with('user', 'comments.user')->findOrFail($id);
        $posts = Post::find($id);

        $comments = $posts->comments()->latest()->get();
    
        $user = User::all();
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

    public function storeReply(Request $request, $commentId)
    {
        $request->validate([
            'komen' => 'required',
            'idpost' => 'required|exists:posts,id',
        ]);

        Reply::create([
            'komen' => $request->komen,
            'idpost' => $request->idpost,
            'idUser' => auth()->id(),
            'comment_id' => $commentId,
        ]);

        return back();
    }
    
    

    public function explore(Request $request){
        return view('../pages/explore');
    }
}
