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
        foreach ($this->years as $year) {
            $this->csvGet('App\Instance', $this->dataDir . '\\' . $year . '\instances.csv');
        }
    }
}
