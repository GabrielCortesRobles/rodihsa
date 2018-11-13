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

class Controller_departamentos extends Controller
{
    //funcion para realizar el registro de un departamentos
    public function altadepartamento(Request $request)
	{
		$validacion = $this->validate($request,
		['departamento'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'activo'=>'required',
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

		$departamentos = new departamentos;
		$departamentos->departamento = $request->departamento;
		$departamentos->archivo = $img2;
		$departamentos->activo = $request->activo;
		$departamentos->save();
		
		return redirect ('administrador');
    }
    
    //funcio para realizar la consulta de departamentos
	public function reportedepartamento()
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
			return view("departamento.Busqueda_departamento")
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
	public function mdepartamento($id_departamento)
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
		$mdepartamento = departamentos::withTrashed()
								->where('id_departamento','=', $id_departamento)
								->get();								
		return view("departamento.Modificacion_departamento")
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
		->with("mdepartamento",$mdepartamento[0]);
	}

	public function actualizadepartamento(Request $request)
	{
		$id_departamento = $request->id_departamento;
		$validacion = $this->validate($request,
		['departamento'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'activo'=>'required',
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
		$departamentos = departamentos::find($id_departamento);
		if($file!="")
		{
			$departamentos->archivo = $img2;
		}
		$departamentos->departamento = $request->departamento;
		$departamentos->activo = $request->activo;
		$departamentos->save();
		
		return redirect ('administrador');
	}
}
