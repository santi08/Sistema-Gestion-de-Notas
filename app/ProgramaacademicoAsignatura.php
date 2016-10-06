<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProgramaacademicoAsignatura
 */
class ProgramaacademicoAsignatura extends Model
{
    protected $table = 'programaacademico_asignatura';

    protected $primaryKey = 'Id';

	public $timestamps = false;

    protected $fillable = [
        'AsignaturaId',
        'programaacademicoId'
    ];

    protected $guarded = [];

        
}