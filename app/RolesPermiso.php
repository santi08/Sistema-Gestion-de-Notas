<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RolesPermiso
 */
class RolesPermiso extends Model
{
    protected $table = 'roles_permisos';
    protected $connection = 'docentes';

    public $timestamps = false;

    protected $fillable = [
        'RolesId',
        'PermisosId'
    ];

    protected $guarded = [];

        
}