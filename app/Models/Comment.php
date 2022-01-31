<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
       'comment', 'user_id', 'recipe_id',
    ];
    
     function post(){
        return $this->belongsTo(Recipe::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
}
