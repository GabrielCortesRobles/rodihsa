<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proveedores extends Model
{
    protected $primaryKey = 'id_proveedor';
	
	protected $fillable=['id_proveedor','nom_proveedor','rfc_proveedor','id_municipio',
	'localidad','cp','calle','num_interior','num_exterior','correo','telefono','activo'];
}
