<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departamentos extends Model
{
    protected $primaryKey = 'id_departamento';
	
	protected $fillable=['id_departamento','departamento'];
}
