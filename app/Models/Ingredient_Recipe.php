<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient_Recipe extends Model
{
    use HasFactory;

    protected $table = "ingredient_recipe";

    protected $fillable = ['ingredient_id', 'recipe_id'];

    public function get_ingredient($id){
        return Ingredient::findOrFail($id)->name;
        // return "aaa";
    }
}
