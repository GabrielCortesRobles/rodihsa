<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Controller_empleado extends Controller
{
	public function altaempleado()
	{
		$this->validate($request,
		['nom_empleado'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'ap_empleado'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'am_empleado'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'rfc_empleado'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'curp_empleado'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'fecha_nacimiento'=>'required|date',
		'localidad'=>'required',
		'cp'=>['regex:/^[0-9]{5}$/'],
		'calle'=>'required',
		'num_interior'=>'required',
		'num_exterior'=>'required',
		'correo'=>'required|email',
		'telefono'=>['regex:/^[0-9]{10}$/'],
		'sexo'=>'required'
		//'beca'=>['regex:/^[0-9]+[.][0-9]{2}$/'],
		//'archivo'=>'image|mimes:jpg,jpeg,png,gif'
		]);

		/*$file = $request->file('archivo');
		if($file!="")
		{
			$ldate = date('Ymd_His');
			$img = $file->getClientOriginalName();
			$img2 = $ldate.$img;
			\Storage::disk('local')->put($img2, \File::get($file));
		}
		else
		{
			$img2 = "sinfoto.jpg";
		}
		$empleado = new empleado;
		$empleado->nom_empleado = $request->nom_empleado;
		$empleado->ap_empleado = $request->ap_empleado;
		$empleado->am_empleado = $request->am_empleado;
		$empleado->rfc_empleado = $request->rfc_empleado;
		$empleado->curp_empleado = $request->curp_empleado;
		$empleado->fecha_nacimiento = $request->fecha_nacimiento;
		$empleado->id_municipio = $request->id_municipio;
		$empleado->localidad = $request->localidad;
		$empleado->cp = $request->cp;
		$empleado->calle = $request->calle;
		$empleado->num_interior = $request->num_interior;
		$empleado->num_exterior = $request->num_exterior;
		$empleado->correo = $request->correo;
		$empleado->telefono = $request->telefono;
		$empleado->sexo = $request->sexo;
		$empleado->activo = $request->activo;
		$empleado->save();*/
	}
}
