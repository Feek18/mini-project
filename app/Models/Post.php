<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function like(){
        return $this->hasMany(Like::class);
    }
    public function reply(){
        return $this->hasMany(Reply::class);
    }
    public function favorite(){
        return $this->hasMany(Favorite::class);
    }
    public function comment(){
        return $this->hasMany(Komen::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}