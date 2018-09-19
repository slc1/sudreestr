<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;
use Backpack\CRUD\CrudTrait;

class Permission extends EntrustPermission
{

    protected static $rules = [
        'name' => 'required',
        'display_name' => 'required',
    ];

    protected $fillable = [
        'user_id',
        'name',
        'display_name',
        'description',
    ];
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
