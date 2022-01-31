<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Faker\Factory;

use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('es_ES'); // create a Spanish faker
        
        for ($i=0; $i < 5; $i++) { 
            Ingredient::create([
                'name' => "ingredient ".$i+1,
                'description' => $faker->sentence(),
            ]);
        }
    }
}
