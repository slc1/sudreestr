<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Document;

class ParseFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse files for sudreestr';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo "Start parse files " . PHP_EOL;
        $documents = Document::where(['file_created' => false])
            ->where('file_create_attempts', '<' , 5)
            //->where('id', '>' , 3566322)
            ->take(1000)
            ->get(); //3566322
        foreach ($documents as $document) {
            try {
                $content = file_get_contents(Document::$urlCommonString . $document->doc_url);
            } catch (\Exception $e) {
                $content = null;
            }
            if ($content) {
                Storage::disk('public')->put(str_replace('-', '/', $document->receipt_date)  . '/' . $document->doc_url, gzencode($content));
                $document->file_created = true;
                $document->save();
                echo 'Uploaded successfully ' . Document::$urlCommonString . $document->doc_url . PHP_EOL;
            } else {
                $document->file_create_attempts++;
                $document->save();
                echo 'Faild get file ' . Document::$urlCommonString . $document->doc_url . 'Attempt ' . $document->file_create_attempts . PHP_EOL;
            }

        }

    }
}
