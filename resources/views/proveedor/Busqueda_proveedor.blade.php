@extends('header.header')
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
						  <th scope="col">OPCIONES</th>
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
							<td>
							@if($prov->deleted_at=="")
							<a href="">Desactivar</a> 
							/<a href="{{URL::action('Controller_proveedor@mproveedor',['id_proveedor'=>$prov->id_proveedor])}}">Modificar</a>
							@else
							<a href="">Activar</a>/
							<a href="">Eliminar</a>
							@endif
							</td>
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