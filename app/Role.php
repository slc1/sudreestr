<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
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

    /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }
}
