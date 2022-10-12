<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $name = $i > 0 ? strtolower($faker->name()) : 'Gwenaelle Batta';
            $slug = Str::slug($name);
            $avatar = $faker->imageUrl(128, 128, true, 'people', $name);
            $email = $i > 0 ? $faker->unique()->safeEmail : 'gwenaelle.batta@student.hepl.be';
            $is_admin = $i > 0 ? false : true;
            $password = bcrypt('change_this');
            User::create(
                    compact('name', 'slug','is_admin', 'avatar', 'email', 'password')
                );
        }
    }
}
