<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SesionRole
 */
class SesionRole extends Model
{
    protected $table = 'sesion_roles';

    public $timestamps = false;

    protected $fillable = [
        'RolesId',
        'sesionId'
    ];

    protected $guarded = [];

        
}