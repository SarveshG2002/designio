<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Assuming you have a foreign key 'user_id' for user associations
        'username',
        'profile',
        'bio',
        'profession',
        'experience',
        'skills',
        'location',
        'presence',
        'gender',
    ];
}
