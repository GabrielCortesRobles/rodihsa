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

class Controller_cliente extends Controller
{

    public function guardacliente(Request $request)
    {
        
        $this->validate($request,[
	    'nom_cliente'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'ap_cliente'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'am_cliente'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'rfc_cliente'=>['regex:/^[A-Z]{4}[0-9]{6}+$/'],
		'curp_cliente'=>['regex:/^[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}+$/'],
		'fecha_nacimiento'=>'required|date',
		'localidad'=>'required',
		'cp'=>['regex:/^[0-9]{5}$/'],
		'calle'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'num_interior'=>'required',
		'num_exterior'=>'required',
		'correo'=>'required|email',
		'telefono'=>['regex:/^[0-9]{10}$/'],
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
		 $img2 = "profile-image.jpg";
	 }
	 
        $cliente = new clientes;
		$cliente->nom_cliente = $request->nom_cliente;
		$cliente->ap_cliente = $request->ap_cliente;
		$cliente->am_cliente = $request->am_cliente;
		$cliente->rfc_cliente = $request->rfc_cliente;
		$cliente->curp_cliente = $request->curp_cliente;
		$cliente->fecha_nacimiento = $request->fecha_nacimiento;
		$cliente->archivo = $img2;
		$cliente->id_municipio = $request->id_municipio;
		$cliente->localidad = $request->localidad;
		$cliente->cp = $request->cp;
		$cliente->calle = $request->calle;
		$cliente->num_interior = $request->num_interior;
		$cliente->num_exterior = $request->num_exterior;
		$cliente->correo = $request->correo;
		$cliente->telefono = $request->telefono;
		$cliente->sexo = $request->sexo;
		$cliente->activo = $request->activo;
		$cliente->save();
				return redirect('administrador');
         
    }
	public function reportecliente()
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
			return view("cliente.Busqueda_cliente")
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
	public function mcliente($id_cliente)
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
		$mcliente = clientes::withTrashed()
								->where('id_cliente','=', $id_cliente)
								->get();	
		return view("cliente.Modificacion_cliente")
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
		->with("mcliente",$mcliente[0]);
	}

	public function actualizacliente(Request $request)
	{
		$id_cliente = $request->id_cliente;
		$validacion = $this->validate($request,
		['nom_cliente'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'ap_cliente'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'am_cliente'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'rfc_cliente'=>['regex:/^[A-Z]{4}[0-9]{6}+$/'],
		'curp_cliente'=>['regex:/^[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}+$/'],
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
		$cliente = clientes::find($id_cliente);
		if($file!="")
		{
			$cliente->archivo = $img2;
		}
		$cliente->id_cliente = $request->id_cliente;
		$cliente->nom_cliente = $request->nom_cliente;
		$cliente->ap_cliente = $request->ap_cliente;
		$cliente->am_cliente = $request->am_cliente;
		$cliente->rfc_cliente = $request->rfc_cliente;
		$cliente->curp_cliente = $request->curp_cliente;
		$cliente->fecha_nacimiento = $request->fecha_nacimiento;
		$cliente->id_municipio = $request->id_municipio;
		$cliente->localidad = $request->localidad;
		$cliente->cp = $request->cp;
		$cliente->calle = $request->calle;
		$cliente->num_interior = $request->num_interior;
		$cliente->num_exterior = $request->num_exterior;
		$cliente->correo = $request->correo;
		$cliente->telefono = $request->telefono;
		$cliente->sexo = $request->sexo;
		$cliente->activo = $request->activo;
		$cliente->save();
		
		return redirect ('administrador');
	
	
}
}
