<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ip
 */
class Ip extends Model
{
    protected $table = 'ip';

    protected $primaryKey = 'Id';

	public $timestamps = false;

    protected $fillable = [
        'direccion'
    ];

    protected $guarded = [];

        
}