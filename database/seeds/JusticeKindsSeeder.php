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
        $this->csvGet('App\JusticeKind', 'd:\PHP_Project\sudreestr_laravel\data\2016\justice_kinds.csv');
    }
}
