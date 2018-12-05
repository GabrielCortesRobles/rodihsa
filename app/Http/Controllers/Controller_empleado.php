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
use Session;

class Controller_empleado extends Controller
{
	public function altaempleado(Request $request)
	{
		$validacion = $this->validate($request,
		['nom_empleado'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'ap_empleado'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'am_empleado'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'rfc_empleado'=>['regex:/^[A-Z]{4}[0-9]{6}+$/'],
		'curp_empleado'=>['regex:/^[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}+$/'],
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
		else
		{
			$img2 = "profile-image.jpg";
		}
		$almacen = $request->privilegio_almacen;
		if($almacen == null)
		{
			$almacen='0';
		}
		$venta = $request->privilegio_venta;
		if($venta == null)
		{
			$venta='0';
		}
		$caja = $request->privilegio_caja;
		if($caja == null)
		{
			$caja='0';
		}
		$empleado = new empleados;
		$empleado->nom_empleado = $request->nom_empleado;
		$empleado->ap_empleado = $request->ap_empleado;
		$empleado->am_empleado = $request->am_empleado;
		$empleado->rfc_empleado = $request->rfc_empleado;
		$empleado->curp_empleado = $request->curp_empleado;
		$empleado->fecha_nacimiento = $request->fecha_nacimiento;
		$empleado->archivo = $img2;
		$empleado->id_municipio = $request->id_municipio;
		$empleado->localidad = $request->localidad;
		$empleado->cp = $request->cp;
		$empleado->calle = $request->calle;
		$empleado->num_interior = $request->num_interior;
		$empleado->num_exterior = $request->num_exterior;
		$empleado->correo = $request->correo;
		$empleado->telefono = $request->telefono;
		$empleado->id_departamento = $request->id_departamento;
		$empleado->sexo = $request->sexo;
		$empleado->activo = $request->activo;
		$empleado->contrasena = $request->contrasena;
		$empleado->privilegio_venta = $venta;
		$empleado->privilegio_almacen = $almacen;
		$empleado->privilegio_caja = $caja;
		$empleado->save();
		
		return redirect ('administrador');
	}
	
	public function reporteempleado()
	{
		if($sname = Session::get('sesionname')=="")
		{
			return redirect()->route('/');
		}
		else
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
			return view("empleado.Busqueda_empleado")
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

	public function mempleado($id_empleado)
	{
		if($sname = Session::get('sesionname')=="")
		{
			return redirect()->route('/');
		}
		else
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
			$mempleado = empleados::withTrashed()
									->where('id_empleado','=', $id_empleado)
									->get();	
			$id_munemp = $mempleado[0]->id_municipio;
			$munemp = municipios::where('id_municipio','=',$id_munemp)
									->orderBy('municipio','ASC')
									->get();
			$demasmunemp = municipios::where('id_municipio', '!=', $id_munemp)
									->orderBy('municipio','ASC')
									->get();
			return view("empleado.Modificacion_empleado")
			->with("demasmunemp",$demasmunemp)
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
			->with("mempleado",$mempleado[0])
			->with("id_munemp",$id_munemp)
			->with("munemp",$munemp[0]->municipio);
		}
	}

	public function actualizaempleado(Request $request)
	{
		$id_empleado = $request->id_empleado;
		$validacion = $this->validate($request,
		['nom_empleado'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'ap_empleado'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'am_empleado'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		'rfc_empleado'=>['regex:/^[A-Z]{4}[0-9]{6}+$/'],
		'curp_empleado'=>['regex:/^[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}+$/'],
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
		$almacen = $request->privilegio_almacen;
		if($almacen == null)
		{
			$almacen='0';
		}
		$venta = $request->privilegio_venta;
		if($venta == null)
		{
			$venta='0';
		}
		$caja = $request->privilegio_caja;
		if($caja == null)
		{
			$caja='0';
		}
		$empleado = empleados::find($id_empleado);
		if($file!="")
		{
			$empleado->archivo = $img2;
		}
		$empleado->id_empleado = $request->id_empleado;
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
		$empleado->id_departamento = $request->id_departamento;
		$empleado->sexo = $request->sexo;
		$empleado->activo = $request->activo;
		$empleado->contrasena = $request->contrasena;
		$empleado->privilegio_venta = $venta;
		$empleado->privilegio_almacen = $almacen;
		$empleado->privilegio_caja = $caja;
		$empleado->save();
		
		return redirect ('administrador');
	}
	public function restaurae($id_empleado)
	{
		empleados::withTrashed()->where('id_empleado',$id_empleado)->restore();
		
		return redirect("reporteempleado");
		
	}
	public function efisicae($id_empleado)
	{
		empleados::withTrashed()->where('id_empleado',$id_empleado)->forceDelete();
		
		return redirect("reporteempleado");
    }
	
	public function eliminae($id_empleado)
	{
		empleados::find($id_empleado)->delete();
		
		return redirect("reporteempleado");
	}
	 Public function login()
    {
        return redirect("login");
    }

    Public function principal()
    {
        if($sname = Session::get('sesionname')=="")
        {
            Session::flash('error', 'Es necesario antes de entrar');
            return redirect()->route('login');  
        }
        else
        {
            return redirect ('administrador');
        }
    }
	 Public function validalogin(Request $request)
    {
        $correo = $request->correo;
        $contrasena = $request->contrasena;
        $consulta = empleados::withTrashed()
                                ->where('correo', $correo)
                                ->where('contrasena', $contrasena)
                                ->get();
        if(count($consulta)==0)
        {
            Session::flash('error', 'El usuario no existe o la contraseña es incorrecta');
            return redirect()->route('login');
        }
        else
        {
            if($consulta[0]->deleted_at !="")
            {
                Session::flash('error', 'El usuario esta desactivado, consulte a su administrador');
                return redirect()->route('login');
            }
            else
            {
                Session::put('sesionname', $consulta[0]->nom_empleado);
                Session::put('sesionid_empleado', $consulta[0]->id_empleado);
                Session::put('sesionprivilegio_almacen', $consulta[0]->privilegio_almacen);
                Session::put('sesionprivilegio_venta', $consulta[0]->privilegio_venta);
                Session::put('sesionprivilegio_caja', $consulta[0]->privilegio_caja);
                Session::put('sesionprivilegio_admin', $consulta[0]->privilegio_admin);
                Session::put('img', $consulta[0]->archivo);
                //esto sirve para leer las sesiones
                /*$sname = Session::get('sesionname');
                $sidu = Session::get('sesionidu');
                $stipo = Session::get('sesiontipo');

                echo $sname. ' '.$sidu .' '. $stipo;*/
                return redirect()->route('administrador');
            }
        }
    }
	 Public function cerrarsesion()
    {
        Session::forget('sesionname');
        Session::forget('sesionprivilegio_admin');
        Session::forget('sesionprivilegio_almacen');
        Session::forget('sesionprivilegio_venta');
        Session::forget('sesionprivilegio_caja');
        Session::forget('sesionid_empleado');
        Session::flush();
        Session::flash('error','Session Cerada corectamente');
        return redirect ()->route('login');
    }
	
}
