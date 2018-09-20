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
        foreach ($this->years as $year) {
            $this->csvGet('App\CauseCategory', $this->dataDir . '\\' . $year . '\cause_categories.csv');
        }

    }
}
