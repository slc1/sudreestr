<?php

use Illuminate\Database\Seeder;

class CsvImportSeeder extends Seeder
{


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
        echo "Started seeding " . $model . PHP_EOL;
        $counter = 0;
        while (($data = fgetcsv($handle, 10000, "\t")) !== FALSE) {
            //echo "<pre>" . print_r($data, 1) . "</pre>". PHP_EOL;
            if ($counter === 0) {
                $indexes = $data;
            } else {
                $model::firstOrCreate(array_combine($indexes,$data));
            }
            if (($counter++ % 1000) == 0) {
                echo "Seeded " . $counter . ' items' . PHP_EOL;
            }
        }
        fclose($handle);
        echo "ended seeding " . $model . PHP_EOL;

    }

}
