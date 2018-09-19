<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'court_code',
        'name',
    ];

}
