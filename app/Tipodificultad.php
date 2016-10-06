<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipodificultad
 */
class Tipodificultad extends Model
{
    protected $table = 'tipodificultad';

    protected $primaryKey = 'Id';

	public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'detalle'
    ];

    protected $guarded = [];

        
}