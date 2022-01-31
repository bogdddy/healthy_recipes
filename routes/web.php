<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('recipe.index');
});
    
Route::get('/categories',[CategoryController::class,'index'])->name('category.index');
Route::get('/categories/{id}',[CategoryController::class,'show'])->name('category.show');
    
    
Route::get('/ingredients',[IngredientController::class,'index'])->name('ingredient.index');
Route::get('/ingredients/create',[IngredientController::class,'create'])->name('ingredient.create');
Route::post('/ingredients/store',[IngredientController::class,'store'])->name('ingredient.store');
Route::delete('/ingredients/{id}',[IngredientController::class,'destroy'])->name('ingredient.destroy');

Route::get('/recipes',[RecipeController::class,'index'])->name('recipe.index');
Route::get('/recipes/create',[RecipeController::class,'create'])->name('recipe.create');
Route::post('/recipes/store',[RecipeController::class,'store'])->name('recipe.store');
Route::get('/recipes/{id}',[RecipeController::class,'show'])->name('recipe.show');

 
Route::post('/comments',[CommentController::class,'store'])->name('comment.create');
Route::delete('comments',[CommentController::class, 'delete'])->name('comment.delete');




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
