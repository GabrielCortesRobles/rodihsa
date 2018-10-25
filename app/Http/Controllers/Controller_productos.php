<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\municipios;
use App\clientes;
use App\productos;
use App\departamentos;

use App\proveedores;

class Controller_productos extends Controller
{
     public function altaproducto()
    {    $clavequesigue = productos::withTrashed()->orderBy('id_producto','desc')
								->take(1)
								->get();
      if (count($clavequesigue)==0){
		 $idprod= 1;
	 }
	 else{
		$idprod = $clavequesigue[0]->id_producto+1;
	 }
		//select * from carreras 
		//ORM ELOQUENT
		// select * from carreras where activo = 'si' order by nombre asc
		//return $carreras;
		$proveedores = proveedores::withTrashed()
		->orderBy('nom_proveedor','asc')
							  ->get();
      return view("producto.Modal_alta_producto")
	   ->with('proveedores',$proveedores)
	  ->with('idprod',$idprod);
    }
    public function guardaproducto(Request $request)
    {
        
        $this->validate($request,[
	    'nom_producto'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'marca'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'codigo'=>['regex:/^[0-9]*$/'],
		'codigo_sat'=>['regex:/^[0-9]*$/'],
		'existencia'=>['regex:/^[0-9]*$/'],
		'descripcion'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'cantidad'=>['regex:/^[0-9]*$/'],
		'precio_cu'=>['regex:/^[0-9]*$/'],
		'precio_menudeo'=>['regex:/^[0-9]*$/'],
		'precio_mayoreo'=>['regex:/^[0-9]*$/'],
		'piezas_mediomayoreo'=>['regex:/^[0-9]*$/'],
		'piezas_mayoreo'=>['regex:/^[0-9]*$/'],
		'archivo'=>'image|mimes:jpg,jpeg,png,gif'
	     ]);
         
     $file = $request->file('archivo');
	 if($file!="")
	 {
	 $ldate = date('Ymd_His_');
	 $img = $file->getClientOriginalName();
	 $img2 = $ldate.$img;
	 \Storage::disk('local')->put($img2, \File::get($file));
	 }
	 else
	 {
		 $img2 = "ventas.jpg";
	 }
	 
        $producto = new productos;
		$producto->nom_producto = $request->nom_producto;
		$producto->marca = $request->marca;
		$producto->id_proveedor = $request->id_proveedor;
		$producto->codigo = $request->codigo;
		$producto->codigo_sat = $request->codigo_sat;
		$producto->existencia = $request->existencia;
		$producto->archivo = $img2;
		$producto->descripcion = $request->descripcion;
		$producto->precio_cu = $request->precio_cu;
		$producto->precio_menudeo = $request->precio_menudeo;
		$producto->precio_mayoreo = $request->precio_mayoreo;
		$producto->piezas_mediomayoreo = $request->piezas_mediomayoreo;
		$producto->piezas_mayoreo = $request->piezas_mayoreo;;
		$producto->activo = $request->activo;
		$producto->save();
		
		
				return redirect('administrador');
         
    }
	public function reporteproducto()
	{
		$municipios = municipios::all();
		$departamentos = departamentos::all();
		$proveedores = proveedores::withTrashed()
		->orderBy('nom_proveedor','asc')
							  ->get();
		$clientes = clientes::withTrashed()
								->orderBy('id_cliente','ASC')
								->get();
		$productos = productos::withTrashed()
								->orderBy('id_producto','ASC')
								->get();
		return view("producto.busqueda_producto")
					->with("municipios",$municipios)
					->with("departamentos",$departamentos)
					->with("proveedores",$proveedores)
					->with("clientes",$clientes)
					->with("productos",$productos);
	}
	
}
