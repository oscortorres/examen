<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // data pul cleaning
    protected $fillable = [
        'user_id', 
        'post_id' , 
        'comment'
    ];
}
