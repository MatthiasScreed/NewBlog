<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->truncate();

        // Create Admin role
        $admin = new Role();
        $admin->name = "admin";
        $admin->display_name = "Admin";
        $admin->save();

        // Create Editor role
        $editor = new Role();
        $editor->name = "editor";
        $editor->display_name = "Editor";
        $editor->save();

        // Create Author role
        $author = new Role();
        $author->name = "author";
        $author->display_name = "Author";
        $author->save();

    }
}
