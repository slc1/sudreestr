<?php

use Illuminate\Database\Seeder;

class CourtsSeeder extends CsvImportSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->csvGet('App\Court', 'd:\PHP_Project\sudreestr_laravel\data\2016\courts.csv');
    }
}
