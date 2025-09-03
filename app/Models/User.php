<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    
/////////////////////////////////////////////////////////////////////

    // Un usuario puede tener muchos posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Un usuario puede tener muchos comentarios
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

///////////////////////////////////////////////////////////////////////

}
