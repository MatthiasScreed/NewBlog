<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // reset the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        // generate 3 users/author
        $faker = Factory::create();

        DB::table('users')->insert([
            [
                'name' => "Matthias",
                'slug' => 'matthias',
                'email' => "christopher.massamba@gmail.com",
                'password' => bcrypt('Usinator7891@&'),
                'bio' => $faker->text(rand(250, 300))
            ],
            [
                'name' => "Jane Doe",
                'slug' => 'jane-doe',
                'email' => "janedoe@test.com",
                'password' => bcrypt('secret'),
                'bio' => $faker->text(rand(250, 300))
            ],
            [
                'name' => "Edo Masaru",
                'slug' => 'edo-masaru',
                'email' => "edo@test.com",
                'password' => bcrypt('secret'),
                'bio' => $faker->text(rand(250, 300))
            ],
        ]);
    }
}
