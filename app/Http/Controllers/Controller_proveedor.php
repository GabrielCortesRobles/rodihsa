<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\municipios;
use App\departamentos;
use App\empresas;
use App\proveedores;
use App\regimenfiscales;
use App\productos;
use App\clientes;
use App\empleados;
use App\entradas;

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
		'telefono'=>['regex:/^[0-9]{10}$/'],
		'archivo'=>'image|mimes:jpg,jpeg,png,gif'
		]);

		$file = $request->file('archivo');
		if($file!="")
		{
			$ldate = date('Ymd_His');
			$img = $file->getClientOriginalName();
			$img2 = $ldate.$img;
			\Storage::disk('local')->put($img2, \File::get($file));
		}
		else
		{
			$img2 = "image-not-found.png";
		}

		$proveedor = new proveedores;
		$proveedor->nom_proveedor = $request->nom_proveedor;
		$proveedor->rfc_proveedor = $request->rfc_proveedor;
		$proveedor->archivo = $img2;
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
		$departamentos = departamentos::all();
			$empresas = empresas::where('id_empresa','=',1)->get();
			$id_municipio = $empresas[0]->id_municipio;
			$munactual = municipios::where('id_municipio','!=',$id_municipio)->get();
			$municipios = municipios::all();
			$id_regimenfiscal = $empresas[0]->id_regimenfiscal;
			$regimen = regimenfiscales::where('id_regimenfiscal', '!=', $id_regimenfiscal)->get();
			$regimenfiscales = regimenfiscales::all();
			$proveedores = proveedores::withTrashed()
									->orderBy('nom_proveedor','asc')
														  ->get();
			$clientes = clientes::withTrashed()
									->orderBy('id_cliente','ASC')
									->get();
			$productos = productos::withTrashed()
									->orderBy('id_producto','ASC')
									->get();
			$entradas = entradas::withTrashed()
									->orderBy('id_entrada','ASC')
									->get();
			$empleados = empleados::withTrashed()
									->orderBy('id_empleado','ASC')
									->get();	
			return view("proveedor.Busqueda_proveedor")
			->with("municipios",$municipios)
			->with("departamentos",$departamentos)
			->with("clientes",$clientes)
			->with("proveedores",$proveedores)
			->with("productos",$productos)
			->with("empleados",$empleados)
			->with("proveedores",$proveedores)
			->with("regimenfiscales",$regimenfiscales)
			->with("regimen",$regimen[0]->descripcion)
			->with("id_regimenfiscal",$id_regimenfiscal)
			->with("id_municipio",$id_municipio)
			->with("munactual",$munactual[0]->municipio)
			->with("empresas",$empresas);
	}
		public function mproveedor($id_proveedor)
	{
		$departamentos = departamentos::all();
		$empresas = empresas::where('id_empresa','=',1)->get();
		$id_municipio = $empresas[0]->id_municipio;
		$munactual = municipios::where('id_municipio','!=',$id_municipio)->get();
		$municipios = municipios::all();
		$id_regimenfiscal = $empresas[0]->id_regimenfiscal;
		$regimen = regimenfiscales::where('id_regimenfiscal', '!=', $id_regimenfiscal)->get();
		$regimenfiscales = regimenfiscales::all();
		$proveedores = proveedores::withTrashed()
								->orderBy('nom_proveedor','asc')
														->get();
		$clientes = clientes::withTrashed()
								->orderBy('id_cliente','ASC')
								->get();
		$productos = productos::withTrashed()
								->orderBy('id_producto','ASC')
								->get();
		$entradas = entradas::withTrashed()
								->orderBy('id_entrada','ASC')
								->get();
		$empleados = empleados::withTrashed()
								->orderBy('id_empleado','ASC')
								->get();
		$mproveedor = proveedores::withTrashed()
								->where('id_proveedor','=', $id_proveedor)
								->get();								
		return view("proveedor.Modificacion_proveedor")
		->with("municipios",$municipios)
		->with("departamentos",$departamentos)
		->with("clientes",$clientes)
		->with("proveedores",$proveedores)
		->with("productos",$productos)
		->with("empleados",$empleados)
		->with("proveedores",$proveedores)
		->with("regimenfiscales",$regimenfiscales)
		->with("regimen",$regimen[0]->descripcion)
		->with("id_regimenfiscal",$id_regimenfiscal)
		->with("id_municipio",$id_municipio)
		->with("munactual",$munactual[0]->municipio)
		->with("empresas",$empresas)
		->with("mproveedor",$mproveedor[0]);
	}

	public function actualizaproveedor(Request $request)
	{
		$id_proveedor = $request->id_proveedor;
		$validacion = $this->validate($request,
		['nom_proveedor'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'rfc_proveedor'=>['regex:/^[A-Z]{3}[0-9]{6}[A-Z]{3}+$/'],
		'calle'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'num_interior'=>'required',
		'num_exterior'=>'required',
		'localidad'=>'required',
		'cp'=>['regex:/^[0-9]{5}$/'],
		'correo'=>'required|email',
		'telefono'=>['regex:/^[0-9]{10}$/'],
		'archivo'=>'image|mimes:jpg,jpeg,png,gif'
		]);

		$file = $request->file('archivo');
		if($file!="")
		{
			$ldate = date('Ymd_His');
			$img = $file->getClientOriginalName();
			$img2 = $ldate.$img;
			\Storage::disk('local')->put($img2, \File::get($file));
		}
		$proveedor = proveedores::find($id_proveedor);
		if($file!="")
		{
			$proveedor->archivo = $img2;
		}
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
}
