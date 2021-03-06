<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        Role::truncate();
        User::truncate();
        //Storage::disk('public')->deleteDirectory('/');

        $adminRole = Role::create(['name' => 'Admin']);
        $writerRole = Role::create(['name' => 'Writer']);

        $viewPostPermission = Permission::create(['name' => 'View posts']);
        $createPostPermission = Permission::create(['name' => 'Create posts']);
        $updatePostPermission = Permission::create(['name' => 'Update posts']);
        $deletePostPermission = Permission::create(['name' => 'Delete posts']);

        $admin = new User;
        $admin->name = "Alvaro";
        $admin->email = "alvaro@gmail.com";
        $admin->password = bcrypt("123456");

        $admin->save();

        $admin->assignRole($adminRole);


        $writer = new User;
        $writer->name = "Pepe";
        $writer->email = "pepe@gmail.com";
        $writer->password = bcrypt("123456");

        $writer->save();

        $writer->assignRole($writerRole);
    }
}
