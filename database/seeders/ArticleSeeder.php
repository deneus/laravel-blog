<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Array_;

class ArticleSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run () {

        $categories = Category::all();
        $tags = Tag::all();

        foreach ($categories as $category) {
            Article::factory()->count(rand(1,3))->create([
                'category_id' => $category->id,
            ]);
        }


//        $faker = Factory::create();
//        for ($i = 0; $i < 26; $i++) {
//            Article::create([
//                'title' => $faker->sentence(),
//                'subtitle' => $faker->sentence(),
//                'content' => $faker->text(),
//                'category_id' => Category::all()->shuffle()->first()->id,
//            ]);
//            dump('article created: '. $i);
//        }

    }
}
