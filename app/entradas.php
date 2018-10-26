<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class entradas extends Model
{
    use SoftDeletes;
   protected $primaryKey = 'id_entrada';
   
   protected $fillable=['id_entrada','id_proveedor','id_empleado','total'];
						 
  protected $date=['deleted_at'];
}
