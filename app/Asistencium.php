<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asistencium
 */
class Asistencium extends Model
{
    protected $table = 'asistencia';

    protected $primaryKey = 'Id';

	public $timestamps = false;

    protected $fillable = [
        'ProgramacionId',
        'Tema',
        'Observacion',
        'Fecha',
        'Tipo',
        'Horas'
    ];

    protected $guarded = [];

        
}