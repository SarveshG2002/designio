<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    // Define the fillable columns
    protected $fillable = [
        'user_id',  // This column should store the user's ID who liked the post
        'post_id',  // This column should store the ID of the post that was liked
    ];

    // Define the base table for the model
    protected $table = 'likes';
}
