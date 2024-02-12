<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->truncate();

        // generate 10 dummy posts data
        $posts = [];
        $faker = Factory::create();
        $date = Carbon::create(2016, 8, 6, 9);

        for ($i = 1; $i <= 10; $i++)
        {
            $date->addDays(1);
            $publishedDate = clone($date);
            $createdDate   = clone($date);

            $posts[] = [
                'user_id'    => rand(1, 3),
                'title'        => $faker->sentence(rand(2, 4)),
                'excerpt'      => $faker->text(rand(250, 300)),
                'body'         => $faker->paragraphs(rand(10, 15), true),
                'slug'         => $faker->slug(),
                'thumbnail'        =>  NULL,
                'created_at'   => $createdDate,
                'updated_at'   => $createdDate,
                'published_at' => $i < 5 ? $publishedDate : ( rand(0, 1) == 0 ? NULL : $publishedDate->addDays(4) ),
                'view_count'   => rand(1, 10) * 10,
                'category_id'  => rand(1, 5),
            ];
        }

        DB::table('posts')->insert($posts);
    }
}
