<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class regimenfiscales extends Model
{
    protected $primaryKey = 'id_regimenfiscal';
	
	protected $fillable=['id_regimenfiscal','descripcion'];
}
