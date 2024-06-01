<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use App\Models\User;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class fungsiPostingController extends Controller
{
    public function bookmark()
    {
        $user_id = Auth::user()->id;

        // Retrieve the authenticated user's bookmarks with the related posts and users
        $bookmarks = Favorite::where('iduser', $user_id)->with('post.user')->get();

        return view('pages.bookmarks', compact('bookmarks'));
    }

    public function bookmarkPost(Request $request)
    {
        $post_id = $request->input('id_post');
        $user_id = auth()->id();

        // Find the existing bookmark if it exists
        $favorite = Favorite::where('id_post', $post_id)->where('iduser', $user_id)->first();

        if ($favorite) {
            // If already bookmarked, remove bookmark
            $favorite->delete();
            $bookmarked = false;
        } else {
            // If not bookmarked, add bookmark
            Favorite::create([
                'iduser' => $user_id,
                'id_post' => $post_id,
            ]);
            $bookmarked = true;
        }

        return response()->json(['bookmarked' => $bookmarked]);
    }

    public function likePost($id)
    {
        $post = Post::findOrFail($id);

        $like = Like::where('post_id', $post->id)->where('userid', Auth::id())->first();

        if (!$like) {
            Like::create([
                'post_id' => $post->id,
                'userid' => Auth::id(),
            ]);
            return response()->json(['success' => 'Post liked successfully']);
        } else {
            return response()->json(['error' => 'Post already liked']);
        }
    }

    public function unlikePost($id)
    {
        $post = Post::findOrFail($id);

        $like = Like::where('post_id', $post->id)->where('userid', Auth::id())->first();

        if ($like) {
            $like->delete();
            return response()->json(['success' => 'Post unliked successfully']);
        } else {
            return response()->json(['error' => 'Post not liked']);
        }
    }

    
}
