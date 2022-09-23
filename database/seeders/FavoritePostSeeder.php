<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class FavoritePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = DB::table('posts')->select('id')->get();
        $authors = DB::table('authors')->select('id')->get();
        for ($i = 0; $i < POSTS_COUNT; $i++) {
            $post_id = $posts[$i]->id;
            for ($j = 0; $j < AUTHORS_COUNT; $j ++) {
                DB::table('favorite_post')->insert([
                    'id' => Uuid::uuid4(),
                    'author_id' => $authors[$j]->id,
                    'post_id' => $post_id,
                    'favorite' => rand(0, 1),
                ]);
            }
        }
    }
}
