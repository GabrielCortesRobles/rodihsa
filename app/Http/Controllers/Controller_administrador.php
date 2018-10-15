<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\municipios;

class Controller_administrador extends Controller
{
	//vista del logeo del sitema
	public function prueba()
	{
		$municipios = municipios::all()
								->orderBy('municipio','asc')
								->get();
		return view("header.Inicio")->with("municipios",$municipios);
	}
	
	//vista del logeo del sitema
	public function login()
	{
		return view("header.Login");
	}
	
	//vista del logeo del sitema
	public function busquedacliente()
	{
		return view("cliente.Tabla_dinamica_cliente");
	}
	
	//vista del logeo del sitema
	public function busquedaproducto()
	{
		return view("producto.Tabla_dinamica_producto");
	}
	
	//vista del logeo del sitema
	public function busquedaempleado()
	{
		return view("empleado.Tabla_dinamica_empleado");
	}
	
	//vista del logeo del sitema
	public function busquedaproveedor()
	{
		return view("proveedor.Tabla_dinamica_proveedor");
	}
	
	//vista del logeo del sitema
	public function moduloventa()
	{
		return view("ventas.Modulo_venta");
	}
	
	//vista principal del sitema
	public function inicio()
		{	
			$municipios = municipios::all();
			return view("header.Inicio")->with("municipios",$municipios);
		}
	
	//vista principal del sitema
	public function session(Request $request)
		{	
			$this->validate($request,
			['correo'=>'email',
			'pass_usuario'=>'required']);
			echo "Listo para guardar";
		}	
	
}
