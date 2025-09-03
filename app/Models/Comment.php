<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Campos que se pueden asignar masivamente
    protected $fillable = ['content', 'user_id', 'post_id'];

     use HasFactory;

    // Un comentario pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un comentario pertenece a un post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
