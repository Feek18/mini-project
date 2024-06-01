<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function comment(){
        return $this->hasMany(Komen::class);
    }
    public function followers(){
        return $this->hasMany(Follower::class, 'id_follow', 'id');
    }
    public function following()
    {
        return $this->hasMany(Follower::class, 'user', 'id');
    }

    public function isFollowing($userId)
    {
        return $this->following()->where('id_follow', $userId)->exists();
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'iduser');
    }
    public function like(){
        return $this->hasMany(Like::class);
    }
    public function reply(){
        return $this->hasMany(Reply::class);
    }
    public function like_komen(){
        return $this->hasMany(Like_Komen::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
