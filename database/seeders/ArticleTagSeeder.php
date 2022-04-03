<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $articles = Article::all();
        foreach ($articles as $article) {
            ArticleTag::factory()->count(rand(0,5))->create([
                'article_id' => $article->id,
                'tag_id' => Tag::all()->shuffle()->first()->id
            ]);

//            $tags = [];
//            for ($i=0; $i<=rand(1,3); $i++) {
//                $tags[] = Tag::all()->shuffle()->first()->id;
//            }
//            $article->tags()->sync($tags);
        }

    }
}
