<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDoc($id)
    {
        $document = Document::findOrFail($id);
        $content = $document->getContent();
        $styleData = '';
        $docFileParts = pathinfo($document->doc_url);
        if ($docFileParts['extension'] == 'html') {
            $docHTML = new \DOMDocument();
            $docHTML->loadHTML($content);

            foreach ($docHTML->getElementsByTagName('meta') as $meta) {
                if($meta->getAttribute('name') == 'description') {
                    $description = $meta->getAttribute('content');
                }
                if($meta->getAttribute('name') == 'description') {
                    $description = $meta->getAttribute('content');
                }

            }

            foreach ($docHTML->getElementsByTagName('style') as $style) {
                $styleData = $style->nodeValue;
                $style->parentNode->removeChild($style);
            }

            $styleData = str_ireplace('body,', '', $styleData);

            $badElements = [
                'meta',
                'script'
            ];
            foreach ($badElements as $badElement) {
                foreach ($docHTML->getElementsByTagName($badElement) as $item) {
                    $item->parentNode->removeChild($item);
                }
            }

            $content = $docHTML->saveHTML();

            $content = str_ireplace(
                ['<HTML>', '</HTML>', '<HEAD>', '</HEAD>', '<BODY>', '</BODY>', 'FONT', 'herb.gif'],
                ['', '', '', '', '', '', 'font', '/herb.gif'],
                $content);

            $content = iconv("Windows-1251", "UTF-8", $content);
        }

        if ($docFileParts['extension'] == 'rtf') {
            $reader = new \RtfReader();
            if ($reader->Parse($content)) {
                $formatter = new \RtfHtml("UTF-8");
                $content = $formatter->Format($reader->root);
            }
        }



        return view('show-doc', [
            'content' => $content,
            'charset' => 'windows-1251',
            'styleData' => $styleData
        ]);
    }

}
