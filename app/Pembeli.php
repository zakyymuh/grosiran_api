<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;

use Laravel\Lumen\Auth\Authorizable;

class Pembeli extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'tb_pembeli';
    protected $primaryKey = 'pembeli_id';
    public $timestamps = false;
    protected $fillable = [
        'pembeli_id',
        'pembeli_name',
        'pembeli_username',
        'pembeli_password',
        'token',
        'last_login'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
//    protected $hidden = [
//        'password',
//    ];
}
