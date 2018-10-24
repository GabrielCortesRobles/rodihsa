<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detalleentradas extends Model
{
     use SoftDeletes;
   protected $primaryKey = 'id_producto';
   
   protected $fillable=['id_detalleentrada','','id_entrada','id_producto'
						,'cantidad','subtotal'];
						 
  protected $date=['deleted_at'];
}
