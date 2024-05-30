<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function reply(){
        return $this->hasMany(Reply::class);
    }
    public function like_komen(){
        return $this->hasMany(Like_Komen::class);
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }
}
