<?php

use Illuminate\Database\Seeder;

class CsvImportSeeder extends Seeder
{

    public $dataDir = "d:\PHP_Project\sudreestr_laravel\data";

    public $years = [
        2007,
        2008,
        2009,
        2010,
        2011,
        2012,
        2013,
        2014,
        //2015,
        2016,
        2017,
        2018
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    }

    public function csvGet($model, $fileName)
    {
        $handle = fopen($fileName, "r");
        if ($handle === false) {
            echo $fileName . " - Bad filename!" . PHP_EOL;
            die;
        }
        $counter = 0;
        $startTime = new DateTime;
        echo "Started seeding $model. Time: " . $startTime->format('Y-m-d H:i:s') . PHP_EOL;
        while (($data = fgetcsv($handle, 10000, "\t")) !== FALSE) {
            if ($counter === 0) {
                $indexes = $data;
            } else {
                $model::firstOrCreate(array_combine($indexes,$data));
            }
            if (($counter++ % 1000) == 0) {
                $interval = (new DateTime())->diff($startTime);
                echo "Seeded " . $counter . ' items. Time passed ' . $interval->format("%H:%I:%S") . PHP_EOL;
            }
        }
        fclose($handle);
        echo "ended seeding " . $model . PHP_EOL;

    }

}
