<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Programaacademico
 */
class Programaacademico extends Model
{
    protected $table = 'programaacademico';

    protected $primaryKey = 'Id';

	public $timestamps = false;

    protected $fillable = [
        'NombrePrograma',
        'UsuarioID',
        'CodigoPrograma'
    ];

    protected $guarded = [];

        
}