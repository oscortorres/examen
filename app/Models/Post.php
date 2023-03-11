<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // data pul cleaning
    protected $fillable = [
        // 'user_id', 
        'name' , 
        'slug',
        'image',
        'posted',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
