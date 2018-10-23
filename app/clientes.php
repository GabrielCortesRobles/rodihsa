<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class clientes extends Model
{
    use SoftDeletes;
   protected $primaryKey = 'id_cliente';
   
   protected $fillable=['id_cliente','nom_cliente','ap_cliente','am_cliente'
						,'rfc_cliente','curp_cliente','fecha_nacimiento','id_municipio'
						,'localidad','cp','calle','num_interior','num_exterior','correo'
						,'correo','telefono','sexo','beca','activo','archivo'];
						 
  protected $date=['deleted_at'];
}
