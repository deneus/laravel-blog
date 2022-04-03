<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    const CATEGORIES = ['IT', 'Games', 'Funny'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(5)->create();


//        $categories =  self::CATEGORIES;
//
//        foreach ($categories as $category) {
//            Category::create([
//                'label' => $category,
//            ]);
//        }
    }
}
