<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    public $timestamps = false;

    public static $urlCommonString = 'http://od.reyestr.court.gov.ua/files/';

    protected $fillable = [
        'doc_id',
        'court_code',
        'judgment_code',
        'justice_kind',
        'category_code',
        'cause_num',
        'adjudication_date',
        'receipt_date',
        'judge_id',
        'doc_url',
        'status',
        'date_publ',
    ];

}
