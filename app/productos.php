<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class productos extends Model
{
    use SoftDeletes;
   protected $primaryKey = 'id_producto';
   
   protected $fillable=['id_producto','nom_producto','marca','id_proveedor'
						,'codigo','codigo_sat','existencia','descripcion'
						,'precio_cu','precio_menudeo','precio_mayoreo','piezas_mediomayoreo','num_interior','num_exterior','correo'
						,'piezas_mayoreo','activo'];
						 
  protected $date=['deleted_at'];
}
