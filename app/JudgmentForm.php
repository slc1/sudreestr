<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JudgmentForm extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'judgment_code',
        'name',
    ];

}
