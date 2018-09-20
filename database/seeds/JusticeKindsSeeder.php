<?php

use Illuminate\Database\Seeder;

class JusticeKindsSeeder extends CsvImportSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->years as $year) {
            $this->csvGet('App\JusticeKind', $this->dataDir . '\\' . $year . '\justice_kinds.csv');
        }
    }
}
