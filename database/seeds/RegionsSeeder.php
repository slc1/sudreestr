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
        foreach ($this->years as $year) {
            $this->csvGet('App\Region', $this->dataDir . '\\' . $year . '\regions.csv');
        }
    }
}
