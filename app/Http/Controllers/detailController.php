<?php

namespace App\Http\Controllers;

use App\Models\Komen;
use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\Follower;
use App\Models\Post;
use App\Models\Like;
use App\Models\Like_Komen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class detailController extends Controller
{
    public function detailGambar(Request $request, $id){
        // Temukan post dengan ID yang diberikan
        $post = Post::find($id);
    
        // Periksa apakah post ditemukan
        if (!$post) {
            // Jika tidak, kembalikan respons 404 atau lakukan penanganan yang sesuai
            return abort(404);
        }
        $likes_komen = Like_Komen::all();
        // Ambil komentar terkait post, disusun dari yang terbaru
        $comments = $post->comments()->latest()->get();
    
        // Ambil semua user (mungkin Anda hanya perlu mengambil user yang terkait dengan post atau komentar)
        $users = User::all();
    
        // Kembalikan view bersama dengan data yang diperlukan
        return view('../pages/detailGambar', [
            'post' => $post,
            'users' => $users,
            'comments' => $comments,
            'likes_komen' => $likes_komen
        ]);
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

        $komen = Komen::find($commentId);

        $reply = Reply::create([
            'idUser' => auth()->id(),
            'idpost' => $komen->post_id,
            'comment_id' => $commentId,
            'komen' => $request->komen,
        ]);

        // echo($reply);
        return back();
    }
    
    

    public function explore(Request $request)
    {
        $user_id = Auth::check() ? Auth::user()->id : null;

        if ($user_id) {
            // Mendapatkan daftar pengguna yang diikuti oleh user yang sedang login
            $following = Follower::where('user', $user_id)->pluck('id_follow');

            // Mendapatkan daftar rekomendasi pengguna yang belum diikuti dan bukan user yang sedang login
            $recommendations = User::where('id', '!=', $user_id)
                                    ->whereNotIn('id', $following)
                                    ->take(5)
                                    ->get();
        } else {
            // Jika pengguna tidak login, rekomendasi kosong atau bisa disesuaikan sesuai kebutuhan
            $recommendations = User::take(5)->get();
        }
        
        // fitur search
        $query = User::orderBy('created_at', 'desc');

        if (request()->has('search')) {
            # code...
            $search = $request->get('search');
            $query->where('username', 'like', '%' . request()->get('search') . '%');
        }

        $users = $query->get(); 
    
        return view('../pages/explore', compact('recommendations', 'users'));
    }

    public function likePost(Request $request)
    {
        $post_id = $request->postLike_id;
        $user_id = auth()->id();

        $like = Like::where('post', $post_id)->where('userid', $user_id)->first();

        if ($like) {
            // If already liked, unlike it
            $like->delete();
            $liked = false;
        } else {
            // If not liked, like it
            Like::create([
                'userid' => $user_id,
                'post' => $post_id,
            ]);
            $liked = true;
        }

        return response()->json(['liked' => $liked]);
    }

    public function deleteReply($id)
    {
        $reply = Reply::findOrFail($id);

        if (auth()->id() != $reply->idUser) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $reply->delete();

        return response()->json(['success' => 'Reply deleted successfully']);
    }

}
