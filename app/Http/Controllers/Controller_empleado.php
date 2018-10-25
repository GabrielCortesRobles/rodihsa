<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\empleados;

use App\municipios;

use App\departamentos;
use App\proveedores;

class Controller_empleado extends Controller
{
	public function altaempleado(Request $request)
	{
		$validacion = $this->validate($request,
		['nom_empleado'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'ap_empleado'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'am_empleado'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'rfc_empleado'=>['regex:/^[A-Z]{4}[0-9]{6}+$/'],
		'curp_empleado'=>['regex:/^[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}+$/'],
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
			$img2 = "profile-image.jpg";
		}
		$almacen = $request->privilegio_almacen;
		if($almacen == null)
		{
			$almacen='0';
		}
		$venta = $request->privilegio_venta;
		if($venta == null)
		{
			$venta='0';
		}
		$caja = $request->privilegio_caja;
		if($caja == null)
		{
			$caja='0';
		}
		$empleado = new empleados;
		$empleado->nom_empleado = $request->nom_empleado;
		$empleado->ap_empleado = $request->ap_empleado;
		$empleado->am_empleado = $request->am_empleado;
		$empleado->rfc_empleado = $request->rfc_empleado;
		$empleado->curp_empleado = $request->curp_empleado;
		$empleado->fecha_nacimiento = $request->fecha_nacimiento;
		$empleado->archivo = $img2;
		$empleado->id_municipio = $request->id_municipio;
		$empleado->localidad = $request->localidad;
		$empleado->cp = $request->cp;
		$empleado->calle = $request->calle;
		$empleado->num_interior = $request->num_interior;
		$empleado->num_exterior = $request->num_exterior;
		$empleado->correo = $request->correo;
		$empleado->telefono = $request->telefono;
		$empleado->id_departamento = $request->id_departamento;
		$empleado->sexo = $request->sexo;
		$empleado->activo = $request->activo;
		$empleado->contrasena = $request->contrasena;
		$empleado->privilegio_venta = $venta;
		$empleado->privilegio_almacen = $almacen;
		$empleado->privilegio_caja = $caja;
		$empleado->save();
		
		return redirect ('administrador');
	}
	
	public function reporteempleado()
	{
		$municipios = municipios::all();
		$departamentos = departamentos::all();
		$proveedores = proveedores::withTrashed()
		->orderBy('nom_proveedor','asc')
							  ->get();
		$empleados = empleados::withTrashed()
								->orderBy('id_empleado','ASC')
								->get();
		return view("empleado.busqueda_empleado")
					->with("empleados",$empleados)
					->with("municipios",$municipios)
					->with("departamentos",$departamentos)
					->with("proveedores",$proveedores);
	}
}
