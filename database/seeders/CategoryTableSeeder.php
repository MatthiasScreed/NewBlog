<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            [
                'name' => 'Web Design',
                'slug' => 'web-design'
            ],
            [
                'name' => 'Web Programming',
                'slug' => 'web-web-programming'
            ],
            [
                'name' => 'Internet',
                'slug' => 'internet'
            ],
            [
                'name' => 'Social Marketing',
                'slug' => 'social-marketing'
            ],
            [
                'name' => 'Photography',
                'slug' => 'photography'
            ],
        ]);

    }
}
