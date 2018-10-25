<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\empresas;

class Controller_empresa extends Controller
{
    public function actualizaempresa(Request $request)
	{
		$id_empresa = $request->id_empresa;
		//nunca se reciben archivos
		$this->validate($request,
		['nom_empresa'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
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
		$empresa = empresa::find($id_empresa);
		$empresa->id_empresa = $request->id_empresa;
		if($file!="")
		{
			$empresa->archivo = $img2;
		}
		$empresa->nombre = $request->nombre;
		$empresa->edad = $request->edad;
		$empresa->sexo = $request->sexo;
		$empresa->cp = $request->cp;
		$empresa->beca = $request->beca;
		$empresa->idc = $request->idc;
		$empresa->save();
		
		return redirect ('administrador');
	}
}
