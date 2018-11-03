<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class impuestos extends Model
{
     protected $primaryKey = 'id_impuesto';
   
   protected $fillable=['id_impuesto','clave','descripcion','retencion'
						,'traslado','activo'];
}
