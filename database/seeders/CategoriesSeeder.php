<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        define('CATEGORIES_COUNT', rand(2, 8));
        for ($i = 0; $i < CATEGORIES_COUNT; $i++) {
            DB::table('categories')->insert([
                    'id' => Uuid::uuid4(),
                    'name' => $name = strtolower(substr($faker->sentence(2), 0, -1)),
                    'slug' => Str::of($name)->slug('-'),
                ]
            );
        }
    }
}
