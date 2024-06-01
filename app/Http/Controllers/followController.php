<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Follower;
use App\Models\Post;
use App\Models\User;

class followController extends Controller
{
    public function following(Request $request){
        // return view('../pages/following');
        $user_id = Auth::user()->id;

        // Mendapatkan daftar pengguna yang diikuti oleh user yang sedang login
        $following_ids = Follower::where('userFollow_id', $user_id)->pluck('id_follow');

        // Mendapatkan postingan dari pengguna yang diikuti
        $posts = Post::whereIn('user_id', $following_ids)
                    ->with(['user', 'comments.replies', 'likes'])
                    ->orderBy('created_at', 'desc')
                    ->get();

        foreach ($posts as $p) {
            $totalComments = $p->comments->count();
            foreach ($p->comments as $comment) {
                $totalComments += $comment->replies->count();
            }
            $p->totalComments = $totalComments;
        }

        // Mendapatkan daftar rekomendasi pengguna yang belum diikuti dan bukan user yang sedang login
        $recommendations = User::where('id', '!=', $user_id)
                                ->whereNotIn('id', $following_ids)
                                ->take(5)
                                ->get();

        return view('../pages/following', compact('recommendations', 'posts'));
    }
}
