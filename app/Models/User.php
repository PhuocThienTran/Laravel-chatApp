<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable: name, email, password, image
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'user_id' => 'array',
    ];

    // userfriendship() binds friendships and users table via friendship_user_id withPivot friendship_user_id. 
    // Thus, each user belongsToMany friendships.
    
    function userfriendship() {
        return $this->belongsToMany('App\Models\User', 'friendships','user_id', 'friendship_user_id')->withPivot('friendship_user_id');
    }
}
