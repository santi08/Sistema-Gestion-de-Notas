<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RolesPermiso
 */
class RolesPermiso extends Model
{
    protected $table = 'roles_permisos';

    public $timestamps = false;

    protected $fillable = [
        'RolesId',
        'PermisosId'
    ];

    protected $guarded = [];

        
}