<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Ingredient_Recipe;
use Illuminate\Http\Request;


class RecipeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $recipes = Recipe::orderBy('id', 'desc')->get()->take(9);

        return view('recipe.index',compact('recipes'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $ingredients = Ingredient::all();
        return view('recipe.create', compact('categories', 'ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe = new Recipe();
        $recipe->title = $request->input('title');
        $recipe->image = "default";
        $recipe->description = $request->input('description');
        $recipe->steps = $request->input('steps');
        $recipe->category_id = $request->input('category');
        $recipe->user_id = $request->input('user');

        
        if($request->hasFile('image')){
            $recipe->image = $request->file('image')->store('uploads', 'public');
        }
        
        $recipe->save();


        foreach ($request->input('ingredients') as $ingredient){
            Ingredient_Recipe::create([
                'ingredient_id' => $ingredient,
                'recipe_id' => $recipe->id,
            ]);
        }

        return redirect()->route('recipe.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {

        $recipe = Recipe::find($id);
        $recipe['steps'] = json_decode($recipe->steps);
        $ingredients = Ingredient_Recipe::all()->where('recipe_id', '=', $recipe->id);


        return view('recipe.show',compact('recipe', "ingredients"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
