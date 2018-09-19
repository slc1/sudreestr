<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        Role::create([
            'id' => 1,
            'name' => 'root',
            'display_name' => 'Root',
            'description' => 'Super Admin',
        ]);

        Role::create([
            'id' => 2,
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => 'Administrator with less rights, then Root',
        ]);

        Role::create([
            'id' => 3,
            'name' => 'editor',
            'display_name' => 'Editor',
            'description' => 'Editor',
        ]);


        Role::create([
            'id' => 4,
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'User with minimal rights',
        ]);


    }
}

