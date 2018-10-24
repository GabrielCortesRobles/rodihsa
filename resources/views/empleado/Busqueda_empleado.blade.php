 @extends('header.header') 
 @section('contenido')
  <!-----Vista busqueda empleado-------->
<fieldset class='form'>
	<br>
	<div align='center'>
		<h2>Resultado de busqueda Empleado</h2>
	</div>
	<hr>
	<br><br>
	<div align='center'>
		<div class="col-md-8">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr class="table-info">
							<th scope="col">ID</th>
							<th scope="col">NOMBRE</th>
							<th scope="col">A. PATERNO</th>
							<th scope="col">A. MATERO</th>
							<th scope="col">DIRECCIÓN</th>
							<th scope="col">C.P.</th>
							<th scope="col">CORREO</th>
							<th scope="col">TELEFONO</th>
							<th scope="col">DEPARTAMENTO</th>
							<th scope="col">PRIV. VENTAS</th>
							<th scope="col">PRIV. CAJA</th>
							<th scope="col">PRIV. ALMACEN</th>
							<th scope="col">SEXO</th>
							<th scope="col">ACTIVO</th>
							<th scope="col">OPCIONES</th>
						</tr>
					</thead>
					@foreach($empleados as $emp)
						<tr>
							<td>{{$emp->id_empeedor}}</td>
							<td>
								<img src="{{asset('Images/'.$emp->archivo)}}" heigth=50 width=50>
							</td>
							<td>{{$emp->nom_empeedor}}</td>
							<td>{{$emp->ap_empeedor}}</td>
							<td>{{$emp->am_empeedor}}</td>
							<td>{{$emp->calle}} {{$emp->num_interior}} {{$emp->num_exterior}}, {{$emp->localidad}}, {{$emp->id_municipio}}</td>
							<td>{{$emp->correo}}</td>
							<td>{{$emp->telefono}}</td>
							<td>
							@if($emp->deleted_at=="")
							<a href="">Desactivar</a> 
							/ <a href="">Modificar</a>
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
	</div>
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