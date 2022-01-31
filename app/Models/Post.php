<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
      'title', 'content'  
    ];
    
    /**
     * Get the comments for the blog post.
     */
    function comments() {
        return $this->hasMany(Comment::class);
    }
    
    /**
     * Get the category that owns the blog post.
     */
    function category() {
        return $this->belongsTo(Category::class);
    }
    
    /**
     * Get the user that owns the blog post.
     */
    function user() {
        return $this->belongsTo(User::class);
    }
}
