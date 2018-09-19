<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'instance_code',
        'name',
    ];

}
