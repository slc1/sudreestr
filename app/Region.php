<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'region_code',
        'name',
    ];

}
