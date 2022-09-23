<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = DB::table('posts')->select('id')->get();
        $categories = DB::table('categories')->select('id')->get();
        for ($i = 0; $i < POSTS_COUNT; $i++) {
            $post_id = $posts[$i]->id;
            for ($j = rand(0, intdiv(CATEGORIES_COUNT, 2)); $j < CATEGORIES_COUNT; $j += rand(1, CATEGORIES_COUNT)) {
                DB::table('category_post')->insert([
                    'id' => Uuid::uuid4(),
                    'category_id' => $categories[$j]->id,
                    'post_id' => $post_id,
                ]);
            }
        }
    }
}
