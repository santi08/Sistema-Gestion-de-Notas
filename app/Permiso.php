<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permiso
 */
class Permiso extends Model
{
    protected $table = 'permisos';

    protected $primaryKey = 'Id';

	public $timestamps = false;

    protected $fillable = [
        'Nombre'
    ];

    protected $guarded = [];

        
}