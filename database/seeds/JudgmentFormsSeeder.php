<?php

use Illuminate\Database\Seeder;

class JudgmentFormsSeeder extends CsvImportSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->years as $year) {
            $this->csvGet('App\JudgmentForm', $this->dataDir . '\\' . $year . '\judgment_forms.csv');
        }
    }
}
