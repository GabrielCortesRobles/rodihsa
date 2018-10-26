<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facturas extends Model
{
    
   protected $primaryKey = 'id_factura';
   
   protected $fillable=['id_factura','id_empresa','id_tipofactura','id_cliente'
						,'id_usofactura'];
		
}
