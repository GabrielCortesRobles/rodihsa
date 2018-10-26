<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empresas extends Model
{
    protected $primaryKey = 'id_empresa';
	
	protected $fillable=['id_empresa','nom_empresa','rfc_empresa', 'razon_social','id_regimenfiscal','id_municipio',
	'archivo','localidad','cp','calle','num_interior','num_exterior','correo','telefono','activo'];
}
