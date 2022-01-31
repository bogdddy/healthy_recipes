<?php
namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Recipe;

class CommentSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Factory::create('es_ES'); // create a Spanish faker
        
        $recipes = Recipe::all();

        foreach ($recipes as $recipe) {
            $users = User::inRandomOrder()->limit(rand(3, 7))->get();

            foreach ($users as $user) {
                Comment::create([
                    'comment' => $faker->sentence(rand(6, 20)),
                    'recipe_id' => $recipe->id,
                    'user_id' => $user->id
                ]);
            }
        }
    }
}
