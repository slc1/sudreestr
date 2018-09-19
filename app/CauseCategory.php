<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauseCategory extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'category_code',
        'name',
    ];

}
