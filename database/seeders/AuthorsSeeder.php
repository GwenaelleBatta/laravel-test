<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        define('AUTHORS_COUNT', rand(2, 8));
        for ($i = 0; $i < AUTHORS_COUNT; $i++) {
            DB::table('authors')->insert([
                    'id' => Uuid::uuid4(),
                    'name' => $name = $i > 0 ? strtolower($faker->name()) : 'gwenaelle batta',
                    'slug' => Str::of($name)->slug('-'),
                    'avatar' =>"https://placehold.jp/128x128.png",
                    'email' => $i > 0 ? $faker->unique()->safeEmail : 'gwenaelle.batta@student.hepl.be',
                    'password' => password_hash('change_this', PASSWORD_DEFAULT),
                    'tokens' => str_replace("-", "",Uuid::uuid4()->toString()),
                ]
            );
        }
    }
}
