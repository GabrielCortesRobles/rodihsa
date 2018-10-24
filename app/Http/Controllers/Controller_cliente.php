<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\clientes;
use App\municipios;

class Controller_cliente extends Controller
{
 public function altacliente()
    {    $clavequesigue = clientes::withTrashed()->orderBy('id_cliente','desc')
								->take(1)
								->get();
     if (count($clavequesigue)==0){
		 $idcl= 1;
	 }
	 else{
		$idcl = $clavequesigue[0]->id_cliente+1;
	 }
		//select * from carreras 
		//ORM ELOQUENT
		// select * from carreras where activo = 'si' order by nombre asc
		$municipios = municipios::orderBy('municipio','asc')
							  ->get();
		//return $carreras;
      return view ("cliente.Modal_alta_cliente")
	  ->with('municipios',$municipios)
	  ->with('idcl',$idcl);
    }
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
		 $img2 = "sinfoto.png";
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
		public function reporteclientes()
	{
	$clientes = clientes::withTrashed()
	                      ->orderBy('id_cliente','ASC')
						  ->get();
	return view('cliente.busqueda_cliente')
	->with('clientes',$clientes)->with("municipios",$municipios);
	}	
}
}
