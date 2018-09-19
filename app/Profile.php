<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
    ];

    public function user()
    {
        return $this->hasOne('App\User', "profile_id");
    }

    public function address()
    {
        return $this->belongsTo('App\Address', "address_id");
    }
}
