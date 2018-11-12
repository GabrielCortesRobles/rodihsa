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
use App\regimenfiscales;
use App\empresas;
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
			return view("entrada.busqueda_entrada")
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
	
}
