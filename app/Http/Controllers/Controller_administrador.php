<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\municipios;

use App\departamentos;

use App\proveedores;

use App\productos;

use App\clientes;

use App\empleados;

use App\entradas;

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
	
	public function modulofactura()
	{
		return view("factura.Modulo_factura");
	}
	
	//vista principal del sitema
	public function inicio()
		{	
			$municipios = municipios::all();
			$departamentos = departamentos::all();
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
			return view("header.Inicio")
			->with("municipios",$municipios)
			->with("departamentos",$departamentos)
			->with("clientes",$clientes)
			->with("proveedores",$proveedores)
			->with("productos",$productos)
			->with("empleados",$empleados);
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
