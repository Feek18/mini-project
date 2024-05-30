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
        $user = User::where('id', Auth::user()->id)->first();
        $posts = Post::find($id);
        return view('../pages/detailGambar', ['posts' => $posts, 'user' => $user]);
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'message' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);
    
        $userId = Auth::id();
        $validateData['user_id'] = $userId;
    
        Komen::create($validateData);
    
        return redirect()->route('detail', ['id' => $validateData['post_id']]);
    }
    

    public function explore(Request $request){
        return view('../pages/explore');
    }
}
