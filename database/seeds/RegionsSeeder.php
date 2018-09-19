<?php

use Illuminate\Database\Seeder;

class RegionsSeeder extends CsvImportSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->csvGet('App\Region', 'd:\PHP_Project\sudreestr_laravel\data\2016\regions.csv');
    }
}
