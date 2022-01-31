<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\User;


class RecipeSeeder extends Seeder
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

        $categories = Category::all();

        foreach ($categories as $category) {

            for ($i = 0; $i < rand(1, 5); $i++) {
                Recipe::create([
                    'title' =>  $faker->text(30),
                    'image' => 'uploads/3SqgCIvvIZlrPh1E5LoeOv1gM46x7vz9jDYERduf.png',
                    'steps' => '
                    [
                        {
                          "@type":"HowToStep",
                          "name":"Preheat",
                          "text":"Preheat the oven to 350 degrees F. Grease and flour a 9x9 inch pan.",
                          "url":"https://example.com/party-coffee-cake#step1",
                          "image":"https://example.com/photos/party-coffee-cake/step1.jpg"
                        },
                        {
                          "@type":"HowToStep",
                          "name":"Mix dry ingredients",
                          "text":"In a large bowl, combine flour, sugar, baking powder, and salt.",
                          "url":"https://example.com/party-coffee-cake#step2",
                          "image":"https://example.com/photos/party-coffee-cake/step2.jpg"
                        },
                        {
                          "@type":"HowToStep",
                          "name":"Add wet ingredients",
                          "text":"Mix in the butter, eggs, and milk.",
                          "url":"https://example.com/party-coffee-cake#step3",
                          "image":"https://example.com/photos/party-coffee-cake/step3.jpg"
                        },
                        {
                          "@type":"HowToStep",
                          "name":"Spread into pan",
                          "text":"Spread into the prepared pan.",
                          "url":"https://example.com/party-coffee-cake#step4",
                          "image":"https://example.com/photos/party-coffee-cake/step4.jpg"
                        },
                        {
                          "@type":"HowToStep",
                          "name":"Bake",
                          "text":"Bake for 30 to 35 minutes, or until firm.",
                          "url":"https://example.com/party-coffee-cake#step5",
                          "image":"https://example.com/photos/party-coffee-cake/step5.jpg"
                        },
                        {
                          "@type":"HowToStep",
                          "name":"Enjoy",
                          "text":"Allow to cool and enjoy.",
                          "url":"https://example.com/party-coffee-cake#step6",
                          "image":"https://example.com/photos/party-coffee-cake/step6.jpg"
                        }
                      ]
                    ',
                    'description' => $faker->text(rand(400, 500)),
                    'user_id' => User::inRandomOrder()->first()->id,
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
