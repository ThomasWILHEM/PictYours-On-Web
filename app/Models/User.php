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

    protected $fillable = ['username', 'name', 'email', 'password', 'image_path'] ;

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function postLiked(){
        return $this->hasMany(Like::class);
    }

    public function followers(){
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'followed_user_id');
    }

    public function followings(){
        return $this->belongsToMany(User::class, 'follows', 'followed_user_id', 'following_user_id');
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
        'password' => 'hashed',
    ];
}
