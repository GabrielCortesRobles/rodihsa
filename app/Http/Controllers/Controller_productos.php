<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\municipios;
use App\departamentos;
use App\empresas;
use App\proveedores;
use App\regimenfiscales;
use App\productos;
use App\clientes;
use App\empleados;
use App\entradas;

class Controller_productos extends Controller
{
    public function guardaproducto(Request $request)
    {
        
        $this->validate($request,[
	    'nom_producto'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'marca'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'codigo'=>['regex:/^[0-9]*$/'],
		'codigo_sat'=>['regex:/^[0-9]*$/'],
		'existencia'=>['regex:/^[0-9]*$/'],
		'descripcion'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'cantidad'=>['regex:/^[0-9]*$/'],
		'precio_cu'=>['regex:/^[0-9]*$/'],
		'precio_menudeo'=>['regex:/^[0-9]*$/'],
		'precio_mayoreo'=>['regex:/^[0-9]*$/'],
		'piezas_mediomayoreo'=>['regex:/^[0-9]*$/'],
		'piezas_mayoreo'=>['regex:/^[0-9]*$/'],
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
		 $img2 = "image-not-found.png";
	 }
	 
        $producto = new productos;
		$producto->nom_producto = $request->nom_producto;
		$producto->marca = $request->marca;
		$producto->id_proveedor = $request->id_proveedor;
		$producto->codigo = $request->codigo;
		$producto->codigo_sat = $request->codigo_sat;
		$producto->existencia = $request->existencia;
		$producto->archivo = $img2;
		$producto->descripcion = $request->descripcion;
		$producto->precio_cu = $request->precio_cu;
		$producto->precio_menudeo = $request->precio_menudeo;
		$producto->precio_mayoreo = $request->precio_mayoreo;
		$producto->piezas_mediomayoreo = $request->piezas_mediomayoreo;
		$producto->piezas_mayoreo = $request->piezas_mayoreo;;
		$producto->activo = $request->activo;
		$producto->save();
		
		
				return redirect('administrador');
         
    }
	public function reporteproducto()
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
			return view("producto.Busqueda_producto")
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
	public function mproducto($id_producto)
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
		$mproducto = productos::withTrashed()
								->where('id_producto','=', $id_producto)
								->get();								
		return view("producto.Modificacion_producto")
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
		->with("empresas",$empresas)
		->with("mproducto",$mproducto[0]);
	}

	public function actualizaproducto(Request $request)
	{
		$id_producto = $request->id_producto;
		$validacion = $this->validate($request,
		['nom_producto'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'marca'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'codigo'=>['regex:/^[0-9]*$/'],
		'codigo_sat'=>['regex:/^[0-9]*$/'],
		'existencia'=>['regex:/^[0-9]*$/'],
		'descripcion'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'cantidad'=>['regex:/^[0-9]*$/'],
		'precio_cu'=>['regex:/^[0-9]*$/'],
		'precio_menudeo'=>['regex:/^[0-9]*$/'],
		'precio_mayoreo'=>['regex:/^[0-9]*$/'],
		'piezas_mediomayoreo'=>['regex:/^[0-9]*$/'],
		'piezas_mayoreo'=>['regex:/^[0-9]*$/'],
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
		$producto = productos::find($id_producto);
		if($file!="")
		{
			$producto->archivo = $img2;
		}
		$producto->nom_producto = $request->nom_producto;
		$producto->marca = $request->marca;
		$producto->id_proveedor = $request->id_proveedor;
		$producto->codigo = $request->codigo;
		$producto->codigo_sat = $request->codigo_sat;
		$producto->existencia = $request->existencia;
		$producto->archivo = $img2;
		$producto->descripcion = $request->descripcion;
		$producto->precio_cu = $request->precio_cu;
		$producto->precio_menudeo = $request->precio_menudeo;
		$producto->precio_mayoreo = $request->precio_mayoreo;
		$producto->piezas_mediomayoreo = $request->piezas_mediomayoreo;
		$producto->piezas_mayoreo = $request->piezas_mayoreo;
		$producto->activo = $request->activo;
		$producto->save();
		
		return redirect ('administrador');
	}
		public function restaurapr($id_producto)
	{
		productos::withTrashed()->where('id_producto',$id_producto)->restore();
		
		return redirect("reporteproducto");
		
	}
	public function efisicapr($id_producto)
	{
		productos::withTrashed()->where('id_producto',$id_producto)->forceDelete();
		
		return redirect("reporteproducto");
    }
	
	public function eliminapr($id_producto)
	{
		productos::find($id_producto)->delete();
		
		return redirect("reporteproducto");
	}
}

