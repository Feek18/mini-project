<?php

use App\Http\Controllers\daftarController;
use App\Http\Controllers\detailController;
use App\Http\Controllers\followController;
use App\Http\Controllers\profileController;
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

Route::get('/', function () {
    return view('index');
})->name('index');

// regis
Route::get('/regis', [daftarController::class, 'registration'])->name('regis');
Route::post('/register', [daftarController::class, 'doneRegister'])->name('register_user');

// login
Route::get('/login', [daftarController::class, 'login'])->name('login');
Route::post('/login-user', [daftarController::class, 'doneLogin'])->name('login_user');
Route::get('/logout', [daftarController::class, 'logout'])->name('logout');

// detail gambar
Route::get('/detail', [detailController::class, 'detailGambar'])->name('detail');
// explore
Route::get('/explore', [detailController::class, 'explore'])->name('explore');

// profil
Route::get('/profile', [profileController::class, 'profil'])->name('profil');
// edit
Route::get('/edit-profil', [profileController::class, 'ediProfil'])->name('editProfil');
// follow
Route::get('/following', [followController::class, 'following'])->name('following');
// notify
Route::get('/notifikasi', [profileController::class, 'notify'])->name('notify');
