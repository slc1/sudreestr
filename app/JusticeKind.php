<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JusticeKind extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'justice_kind',
        'name',
    ];

}
