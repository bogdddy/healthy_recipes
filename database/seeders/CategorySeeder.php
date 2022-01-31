<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
        
        for ($i = 0; $i < 10; $i++) {
            Category::create([
                'title' => "category ".$i+1,
            ]);
        }
    }
}
