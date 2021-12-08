<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    use HasFactory;

    /* The attributes that are mass assignable: user_id, friendship_user_id */

    protected $fillable = ['user_id', 'friendship_user_id'];

    
}
