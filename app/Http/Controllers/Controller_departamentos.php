<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\municipios;
use App\departamentos;
use App\proveedores;

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
		$municipios = municipios::all();
		$departamentos = departamentos::withTrashed()
								->orderBy('id_departamento','ASC')
								->get();
        $proveedores = proveedores::withTrashed()
                                ->orderBy('id_proveedor','ASC')
                                ->get();
		return view("departamento.busqueda_departamento")
					->with("departamentos",$departamentos)
                    ->with("municipios",$municipios)
                    ->with("proveedores",$proveedores);
	}
}
