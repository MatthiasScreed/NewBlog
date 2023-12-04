<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->truncate();
        // crud post
        $crudPost = new Permission();
        $crudPost->name = "crud-post";
        $crudPost->save();

        // Update others post
        $updateOthersPost = new Permission();
        $updateOthersPost->name = "update-others-post";
        $updateOthersPost->save();

        // delete others post
        $deleteOthersPost = new Permission();
        $deleteOthersPost->name = "delete-others-post";
        $deleteOthersPost->save();

        // crud category
        $crudCategory = new Permission();
        $crudCategory->name = "crud-category";
        $crudCategory->save();

        // crud user
        $crudUser = new Permission();
        $crudUser->name = "crud-user";
        $crudUser->save();

        // attach roles permissions
        $admin = Role::whereName('admin')->first();
        $editor = Role::whereName('editor')->first();
        $author = Role::whereName('author')->first();

        $admin->givePermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory, $crudUser]);
        $editor->givePermissions([$crudPost, $updateOthersPost, $deleteOthersPost, $crudCategory]);
        $author->givePermissions([$crudPost]);

    }
}
