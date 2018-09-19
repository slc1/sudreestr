<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(RolesTableSeeder::class);
        //$this->call(UsersTableSeeder::class);

        $this->call(CauseCategoriesSeeder::class);
        $this->call(CourtsSeeder::class);
        $this->call(InstancesSeeder::class);
        $this->call(JudgmentFormsSeeder::class);
        $this->call(JusticeKindsSeeder::class);
        $this->call(RegionsSeeder::class);

        //$this->call(DocumentsSeeder::class);
    }
}
