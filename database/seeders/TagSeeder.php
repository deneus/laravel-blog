<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{

//    const TAGS = ['Drupal', 'Laravel', 'Symfony'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory()->count(10)->create();


//        $tags =  self::TAGS;
//
//        foreach ($tags as $tag) {
//            Tag::create([
//                'label' => $tag,
//            ]);
//        }
    }
}
