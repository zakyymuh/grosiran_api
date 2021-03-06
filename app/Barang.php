<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;

use Laravel\Lumen\Auth\Authorizable;

class Barang extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'tb_barang';
    public $timestamps = false;
    protected $primaryKey = 'barang_id';
    protected $fillable = [
        'barang_id',
        'barang_name',
        'barang_price',
        'barang_total',
        'barang_unit',
        'grosir_id',
        'updated_at',
        'created_at',
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
