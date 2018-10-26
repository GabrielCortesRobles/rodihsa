<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\municipios;
use App\clientes;
use App\proveedores;
use App\productos;
use App\empleados;
use App\entradas;
use App\departamentos;

class Controller_entrada extends Controller
{
    public function altaentrada(Request $request)
    {
        $ent = new entradas;
		$ent->id_proveedor = $request->id_proveedor;
		$ent->id_empleado = $request->id_empleado;
		$ent->total = $request->total;		
		$ent->save();
				return redirect('administrador');
    }
	public function reporteentrada()
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
		$id_empleado = $entradas[0]->id_empleado;
		$entradas = empleados::withTrashed()->where('id_empleado', '=', $id_empleado)
								->orderBy('id_empleado','ASC')
								->get();
		$empleados = empleados::withTrashed()
								->orderBy('id_empleado','ASC')
								->get();
		return view("entrada.busqueda_entrada")
					->with("municipios",$municipios)
					->with("departamentos",$departamentos)
					->with("proveedores",$proveedores)
					->with("clientes",$clientes)
					->with("productos",$productos)
					->with("empleados",$empleados)
					->with("entradas",$entradas);
	}
	
}
