<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class fungsiPostingController extends Controller
{
    public function likePost($id)
    {
        $post = Post::findOrFail($id);

        $like = Like::where('post', $post->id)->where('userid', Auth::id())->first();

        if ($like) {
            $like->delete();
            return response()->json(['success' => 'Post unliked successfully']);
        } else {
            Like::create([
                'post' => $post->id,
                'userid' => Auth::id(),
            ]);
            return response()->json(['success' => 'Post liked successfully']);
        }
    }
}
