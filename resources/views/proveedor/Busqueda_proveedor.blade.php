@extends('header.Header')
@section('contenido')
<fieldset class='form'>
	<br>
	<div align='center'>
		<h2>Resultado de busqueda Proveedor</h2>
	</div>
	<hr>
	<form class="was-validated" action='' method='POST'>
		<br><br>
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr class="table-info">
						  <th scope="col">ID</th>
						  <th scope="col">LOGO</th>
						  <th scope="col">RFC</th>
						  <th scope="col">NOMBRE DE LA EMPESA</th>
						  <th scope="col">DIRECCIÓN</th>
						  <th scope="col">CORREO</th>
						  <th scope="col">TELEFONO</th>
						  @if(Session::get('sesionprivilegio_admin')|Session::get('sesionprivilegio_almacen')=='1')
						  <th scope="col">OPCIONES</th>
							@endif
						</tr>
					</thead>
					@foreach($proveedores as $prov)
						<tr>
							<td>{{$prov->id_proveedor}}</td>
							<td>
								<img src="{{asset('Images/'.$prov->archivo)}}" heigth=50 width=50>
							</td>
							<td>{{$prov->rfc_proveedor}}</td>
							<td>{{$prov->nom_proveedor}}</td>
							<td>{{$prov->calle}} {{$prov->num_interior}} {{$prov->num_exterior}}, {{$prov->localidad}}, {{$prov->id_municipio}}</td>
							<td>{{$prov->correo}}</td>
							<td>{{$prov->telefono}}</td>
							@if(Session::get('sesionprivilegio_admin')|Session::get('sesionprivilegio_almacen')=='1')
							<td>
							@if($prov->deleted_at=="")
								
							<a href="{{URL::action('Controller_proveedor@eliminap',['id_proveedor'=>$prov->id_proveedor])}}"> Desactivar</a> 
							/<a href="{{URL::action('Controller_proveedor@mproveedor',['id_proveedor'=>$prov->id_proveedor])}}">Modificar</a>
							@else
							<a href="{{URL::action('Controller_proveedor@restaurap',['id_proveedor'=>$prov->id_proveedor])}}"> Activar</a>/
							<a href="{{URL::action('Controller_proveedor@efisicap',['id_proveedor'=>$prov->id_proveedor])}}"> Eliminar</a>
							@endif
							</td>
							@endif
						</tr>
					@endforeach
			</table>
		</div>
	</div>
	</form>
	<br>
	<div align='center'>
		<form action = '' method='POST'>
				<button type="submit" class="btn btn-success" >Reporte en Excel</button>
		</form>
		<form action = "" method='POST'>
				<button type="submit" class="btn btn-danger"  >Reporte en pdf</button>
		</form>
	</div>
</fieldset>
@stop