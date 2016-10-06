<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 */
class Role extends Model
{
    protected $table = 'roles';

    protected $primaryKey = 'Id';

	public $timestamps = false;

    protected $fillable = [
        'Nombre'
    ];

    protected $guarded = [];

        
}