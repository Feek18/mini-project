<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function likes(){
        return $this->hasMany(Like::class, 'post');
    }
    public function replies(){
        return $this->hasMany(Reply::class);
    }
    public function favorites(){
        return $this->hasMany(Favorite::class, 'id_post');
    }
    public function isBookmarkedByUser()
    {
        return $this->favorites()->where('iduser', auth()->id())->exists();
    }
    public function isLikedByUser()
    {
        return $this->likes()->where('userid', auth()->id())->exists();
    }
    public function comments(){
        return $this->hasMany(Komen::class, 'post_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}