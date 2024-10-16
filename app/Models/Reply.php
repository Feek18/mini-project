<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function post(){
        return $this->belongsTo(Post::class, 'idpost');
    }
    public function comment(){
        return $this->belongsTo(Komen::class, 'comment_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'idUser');
    }
}
