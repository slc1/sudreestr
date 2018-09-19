<?php

use Illuminate\Database\Seeder;

class InstancesSeeder extends CsvImportSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->csvGet('App\Instance', 'd:\PHP_Project\sudreestr_laravel\data\2016\instances.csv');
    }
}
