<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\proveedores;
use App\municipios;
use App\departamentos;

class Controller_proveedor extends Controller
{
	//funcion para realizar el registro de un proveedor
    public function altaproveedor(Request $request)
	{
		$validacion = $this->validate($request,
		['nom_proveedor'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'rfc_proveedor'=>['regex:/^[A-Z]{3}[0-9]{6}[A-Z]{3}+$/'],
		'calle'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'num_interior'=>'required',
		'num_exterior'=>'required',
		'localidad'=>'required',
		'cp'=>['regex:/^[0-9]{5}$/'],
		'correo'=>'required|email',
		'telefono'=>['regex:/^[0-9]{10}$/']
		]);

		$proveedor = new proveedores;
		$proveedor->nom_proveedor = $request->nom_proveedor;
		$proveedor->rfc_proveedor = $request->rfc_proveedor;
		$proveedor->id_municipio = $request->id_municipio;
		$proveedor->localidad = $request->localidad;
		$proveedor->cp = $request->cp;
		$proveedor->calle = $request->calle;
		$proveedor->num_interior = $request->num_interior;
		$proveedor->num_exterior = $request->num_exterior;
		$proveedor->correo = $request->correo;
		$proveedor->telefono = $request->telefono;
		$proveedor->activo = $request->activo;
		$proveedor->save();
		
		return redirect ('administrador');
	}
	
	//funcio para realizar la consulta de proveedores
	public function reporteproveedor()
	{
		$municipios = municipios::all();
		$departamentos = departamentos::all();
		$proveedores = proveedores::withTrashed()
								->orderBy('id_proveedor','ASC')
								->get();
		return view("proveedor.busqueda_proveedor")
					->with("proveedores",$proveedores)
					->with("municipios",$municipios)
					->with("departamentos",$departamentos);
	}
}
