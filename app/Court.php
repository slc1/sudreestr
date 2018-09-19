<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'court_code',
        'name',
        'instance_code',
        'region_code',
    ];

}
