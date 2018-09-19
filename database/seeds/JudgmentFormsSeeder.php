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
        $this->csvGet('App\JudgmentForm', 'd:\PHP_Project\sudreestr_laravel\data\2016\judgment_forms.csv');
    }
}
