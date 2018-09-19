<?php

use Illuminate\Database\Seeder;
use App\CauseCategory;

class CauseCategoriesSeeder extends CsvImportSeeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->csvGet('App\CauseCategory', 'd:\PHP_Project\sudreestr_laravel\data\2016\cause_categories.csv');
    }
}
