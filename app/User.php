<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable,EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->belongsTo('App\Profile', "profile_id");
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    /**
     * Save a new model and return the instance.
     *
     * @param  array  $attributes role element hold information about user role
     * @return static
     */

    public static function create(array $attributes = [])
    {
        // before save code
        $role = empty($attributes['role']) ? null : $attributes['role'];
        unset($attributes['role']);
        $user = static::query()->create($attributes);
        // after save code
        if ($user == null) throw new Exception("Unable to create user");
        if (empty($role)) {
            $user->attachRole(Role::where('name', '=','user')->first());
        } else {
            $user->attachRole(Role::where('name', '=',$role)->first());
        }

        return $user;
    }
}
