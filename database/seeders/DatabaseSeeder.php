<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductsSeeder::class);
        $this->call(AuthorsSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(CommentsSeeder::class);
        $this->call(CategoryPostSeeder::class);
        $this->call(FavoritePostSeeder::class);
    }
}
