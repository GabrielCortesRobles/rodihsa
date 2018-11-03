<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipofacturas extends Model
{
    protected $primaryKey = 'id_tipofactura';
   
		protected $fillable=['id_tipofactura','clave','descripcion','activo'];
}
