<?php

use Illuminate\Database\Seeder;
use App\Document;
use App\Judge;

class DocumentsSeeder extends Seeder
{



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->csvGet('d:\PHP_Project\sudreestr_laravel\data\2008\documents.csv');
    }

    public function csvGet($fileName)
    {
        $handle = fopen($fileName, "r");
        if ($handle === false) {
            echo $fileName . " - Bad filename!" . PHP_EOL;
            die;
        }
        $counter = 0;
        $startTime = new DateTime;
        echo "Started seeding Document. Time: " . $startTime->format('Y-m-d H:i:s') . PHP_EOL;
        while (($data = fgetcsv($handle, 10000, "\t")) !== FALSE) {
            if ($counter === 0) {
                $indexes = $data;
            } else {
                if ($counter > 2067935) {
                    if (count($indexes) == count($data)) {
                        $modelArray = array_combine($indexes,$data);
                        $judge = Judge::firstOrCreate([
                            'court_code' => $modelArray['court_code'],
                            'name' => $modelArray['judge']
                        ]);
                        unset($modelArray['judge']);
                        $modelArray['judge_id'] = $judge->id;
                        $modelArray['doc_url'] = str_replace(Document::$urlCommonString, '', $modelArray['doc_url']);
                        $modelArray['adjudication_date'] = (new DateTime($modelArray['adjudication_date']))->format('Y-m-d');
                        $modelArray['receipt_date'] = (new DateTime($modelArray['receipt_date']))->format('Y-m-d');
                        $modelArray['date_publ'] = (new DateTime($modelArray['date_publ']))->format('Y-m-d');
                        if (empty($modelArray['justice_kind'])) {
                            $modelArray['justice_kind'] = 0;
                        }
                        //Document::create($modelArray);
                        Document::firstOrCreate($modelArray);
                    } else {
                        echo "Bad data " . $counter  . PHP_EOL;
                    }
                }
            }
            if (($counter++ % 1000) == 0) {
                $interval = (new DateTime())->diff($startTime);
                echo "Seeded " . $counter . ' items. Time passed ' . $interval->format("%H:%I:%S") . PHP_EOL;
            }
        }
        fclose($handle);
        echo "ended seeding Document" . PHP_EOL;

    }
}
