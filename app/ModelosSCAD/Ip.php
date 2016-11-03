<?php

namespace App\ModelosSCAD;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ip
 */
class Ip extends Model
{
    protected $table = 'ip';
    protected $connection = 'docentes';

    protected $primaryKey = 'Id';

	public $timestamps = false;

    protected $fillable = [
        'direccion'
    ];

    protected $guarded = [];

        
}