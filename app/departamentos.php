<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class departamentos extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id_departamento';
	
    protected $fillable=['id_departamento','departamento','archivo'];
    protected $date=['deleted_at'];
}
