<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected static $rules = [
        'street1' => 'required',
        'city' => 'required',
        'state' => 'required',
        'zip' => 'required|digits:5',
    ];


    protected $fillable = [
        'street1',
        'street2',
        'city',
        'state',
        'zip',
        'country',
    ];

    public function profile()
    {
        return $this->hasOne('App\Profile', "address_id");
    }
}
