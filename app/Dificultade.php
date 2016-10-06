<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dificultade
 */
class Dificultade extends Model
{
    protected $table = 'dificultades';

    protected $primaryKey = 'Id';

	public $timestamps = false;

    protected $fillable = [
        'AsistenciaId',
        'TipoDificultadId',
        'Detalle'
    ];

    protected $guarded = [];

        
}