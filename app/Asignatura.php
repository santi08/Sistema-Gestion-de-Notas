<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asignatura
 */
class Asignatura extends Model
{
    protected $table = 'asignatura';

    protected $primaryKey = 'Id';

	public $timestamps = false;

    protected $fillable = [
        'Codigo',
        'Nombre',
        'Creditos',
        'HorasSemanales'
    ];

    protected $guarded = [];

        
}