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
        foreach ($this->years as $year) {
            $this->csvGet('App\Court', $this->dataDir . '\\' . $year . '\courts.csv');
        }
    }
}
