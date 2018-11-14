<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usofacturas extends Model
{
    protected $primaryKey = 'id_usofactura';
   
		protected $fillable=['id_usofactura','clave','descripcion','tipo_persona'
						,'activo'];
}
