<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class empleados extends Model
{
    use SoftDeletes;
	
    protected $primaryKey = 'id_empleado';
	
	protected $fillable=['id_empleado','nom_empleado','ap_empleado','am_empleado','rfc_empleado',
	'curp_empleado','fecha_nacimiento','id_municipio','localidad','cp','calle','num_interior',
	'num_exterior','correo','telefono','activo','id_departamento','contrasena','privilegio_almacen',
	'privilegio_venta','privilegio_admin','archivo'];
	
	protected $date = ['deleted_at'];
}
