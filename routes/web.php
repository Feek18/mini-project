<?php

use App\Http\Controllers\daftarController;
use App\Http\Controllers\detailController;
use App\Http\Controllers\followController;
use App\Http\Controllers\fungsiPostingController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\likes_komenController;
use App\Http\Controllers\profileController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [homeController::class, 'index'])->name('index');

// regis
Route::get('/regis', [daftarController::class, 'registration'])->name('regis');
Route::post('/register', [daftarController::class, 'doneRegister'])->name('register_user');

// login
Route::get('/login', [daftarController::class, 'login'])->name('login');
Route::post('/login-user', [daftarController::class, 'doneLogin'])->name('login_user');
Route::get('/logout', [daftarController::class, 'logout'])->name('logout');

// detail gambar
Route::get('/detail/{id}', [detailController::class, 'detailGambar'])->name('detail')->middleware('auth');
Route::post('/detail-data', [detailController::class, 'store'])->name('komen-data');
// explore
Route::get('/explore', [detailController::class, 'explore'])->name('explore');
// bookmark
Route::get('/bookmarks', [fungsiPostingController::class, 'bookmark'])->name('bookmark');
Route::post('/bookmark-detail', [fungsiPostingController::class, 'bookmarkPost'])->name('bookmark.post');

// profil
Route::get('/profile', [profileController::class, 'profil'])->name('profil');
// menampilkan user login lain
Route::get('/user/{id}', [profileController::class, 'showOtherUser'])->middleware('auth');
// edit
Route::get('/edit-profil', [profileController::class, 'edit'])->name('editProfil');
Route::put('/edit-profil/{id}/update', [profileController::class, 'update'])->name('updateData');
// follow
Route::get('/following', [followController::class, 'following'])->name('following');
Route::post('/follow', [followController::class, 'followUser'])->name('follow.user');
Route::get('/followers/{id}', [followController::class, 'seeFollowers'])->name('see_followers')->middleware('auth');
Route::get('/followings/{id}', [followController::class, 'seeFollowings'])->name('see_followings')->middleware('auth');
Route::delete('/unfollow/{id}', [followController::class, 'unfollow'])->name('unfollow');


// notify
Route::get('/notifikasi', [profileController::class, 'notify'])->name('notify');
// posting
Route::get('/posting', [profileController::class, 'posting'])->name('posting');
Route::post('/form-data', [profileController::class, 'store'])->name('formData');
Route::delete('/comments/{id}', [profileController::class, 'deleteComment'])->name('delete_comment');
Route::post('/like-post', [detailController::class, 'likePost'])->name('like.post');
// reply
Route::post('/comments/{id}/replies', [detailController::class, 'storeReply'])->name('replies.store');
Route::delete('/replies/{id}', [detailController::class, 'deleteReply'])->name('delete_reply');
// like
Route::post('/posts/{post}/like', [fungsiPostingController::class, 'likePost'])->name('posts.like');
Route::post('/posts/{post}/unlike', [fungsiPostingController::class, 'unlikePost'])->name('posts.unlike');
// like-komen
Route::post('/like_komen', [likes_komenController::class, 'likekomen']);
Route::get('/like_komen', [likes_komenController::class, 'like'])->name('likekomen');
