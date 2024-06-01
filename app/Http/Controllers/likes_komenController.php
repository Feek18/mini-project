<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like_Komen;
use App\Models\User;
use App\Models\Post;
class likes_komenController extends Controller
{
    public function like(Request $request){
        return redirect()->route('detail');
    }

    public function likekomen(Request $request){
        $validateData = $request->validate([
            'Userid' => 'required',
            'id_comment' => 'required',
            'id' => 'required',
        ]);
        // dd($validateData);

        $post = Post::find($request->id);
    
        $likes_komen = Like_Komen::all();
        // Ambil komentar terkait post, disusun dari yang terbaru
        $comments = $post->comments()->latest()->get();
        
        $like = Like_Komen::find($request->id);

        $users = User::all();
        $existing_like = Like_Komen::where('Userid', $validateData['Userid'])
                            ->where('id_comment', $validateData['id_comment'])
                            ->first();

        if ($existing_like) {
            // Jika pengguna sudah memberikan suka, Anda dapat memberikan respon yang sesuai
            return redirect()->route('detail', ['id' => $request->id])->with([
                'post' => $post, 
                'likes_komen' => $likes_komen, 
                'comments' => $comments, 
                'users' => $users,
                'message' => 'Anda sudah memberikan suka.'
            ]);
        } else {
            // Jika pengguna belum memberikan suka, tambahkan logika pembuatan suka baru
            if (Like_Komen::create($validateData)) {
                return redirect()->route('detail', ['id' => $request->id])->with([
                    'post' => $post, 
                    'likes_komen' => $likes_komen, 
                    'comments' => $comments, 
                    'users' => $users,
                    'message' => 'Suka berhasil ditambahkan.'
                ]);
            } else {
                return 'gagal';
            }
        }

    }
}
