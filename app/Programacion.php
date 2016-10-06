<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Programacion
 */
class Programacion extends Model
{
    protected $table = 'programacion';

    protected $primaryKey = 'Id';

	public $timestamps = false;

    protected $fillable = [
        'horarioId',
        'HoraInicio',
        'HoraFin',
        'Dia'
    ];

    protected $guarded = [];

        
}