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
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr class="table-info">
							<th scope="col">ID</th>
							<th scope="col">FOTO</th>
							<th scope="col">NOMBRE</th>
							<th scope="col">A. PATERNO</th>
							<th scope="col">A. MATERO</th>
							<th scope="col">DIRECCIÓN</th>
							<th scope="col">CORREO</th>
							<th scope="col">TELEFONO</th>
							@if(Session::get('sesionprivilegio_admin')|Session::get('sesionprivilegio_almacen')=='1')
							<th scope="col">OPCIONES</th>
							@endif
						</tr>
					</thead>
					@foreach($empleados as $emp)
						<tr>
							<td>{{$emp->id_empleado}}</td>
							<td>
							<img src="{{asset('Images/'.$emp->archivo)}}" heigth=50 width=50>
							</td>
							<td>{{$emp->nom_empleado}}</td>
							<td>{{$emp->ap_empleado}}</td>
							<td>{{$emp->am_empleado}}</td>
							<td>{{$emp->calle}} {{$emp->num_interior}} {{$emp->num_exterior}}, {{$emp->localidad}}, {{$emp->id_municipio}}</td>
							<td>{{$emp->correo}}</td>
							<td>{{$emp->telefono}}</td>
							@if(Session::get('sesionprivilegio_admin')|Session::get('sesionprivilegio_almacen')=='1')
							<td>
							@if($emp->deleted_at=="")
							
							<a href="{{URL::action('Controller_empleado@eliminae',['id_empleado'=>$emp->id_empleado])}}"> Desactivar</a> 
							/ <a href="{{URL::action('Controller_empleado@mempleado',['id_empleado'=>$emp->id_empleado])}}">Modificar</a>
							@endif
							@else
							@if(Session::get('sesionprivilegio_admin')|Session::get('sesionprivilegio_almacen')=='1')
							<a href="{{URL::action('Controller_empleado@restaurae',['id_empleado'=>$emp->id_empleado])}}"> Activar</a>/
							<a href="{{URL::action('Controller_empleado@efisicae',['id_empleado'=>$emp->id_empleado])}}"> Eliminar</a>
							@endif
							
							</td>
							@endif
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