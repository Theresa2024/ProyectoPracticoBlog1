<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;


class Post extends Model
{
    protected $fillable = ['title', 'content' , 'user_id'];

    use HasFactory;

    // Un post pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un post puede tener muchos comentarios
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
