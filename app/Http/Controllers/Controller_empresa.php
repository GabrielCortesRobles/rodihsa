<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\empresas;

class Controller_empresa extends Controller
{
    public function actualizaempresa(Request $request)
	{
		$id_empresa = '1';
		//nunca se reciben archivos
		$this->validate($request,
		['nom_empresa'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú,.]+$/'],
        'rfc_empresa'=>['regex:/^[A-Z]{3}[0-9]{6}[A-Z]{3}+$/'],
        'razon_social'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
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
		$emp = empresas::find($id_empresa);
		$emp->id_empresa = $id_empresa;
		if($file!="")
		{
			$emp->archivo = $img2;
		}
		$emp->nom_empresa = $request->nom_empresa;
		$emp->rfc_empresa = $request->rfc_empresa;
		$emp->razon_social = $request->razon_social;
		$emp->id_regimenfiscal = $request->id_regimenfiscal;
		$emp->id_municipio = $request->id_municipio;
		$emp->localidad = $request->localidad;
		$emp->cp = $request->cp;
		$emp->calle = $request->calle;
		$emp->num_interior = $request->num_interior;
		$emp->num_exterior = $request->num_exterior;
		$emp->correo = $request->correo;
		$emp->telefono = $request->telefono;
		$emp->activo = $request->activo;
		$emp->save();
		
		return redirect ('administrador');
	}
}
