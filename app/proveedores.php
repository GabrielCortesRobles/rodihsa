<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class proveedores extends Model
{
	use SoftDeletes;
	
    protected $primaryKey = 'id_proveedor';
	
	protected $fillable=['id_proveedor','nom_proveedor','rfc_proveedor','id_municipio',
	'localidad','cp','calle','num_interior','num_exterior','correo','telefono','activo','archivo'];
	
	protected $date = ['deleted_at'];
}
