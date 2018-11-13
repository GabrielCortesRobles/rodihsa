 @extends('header.header') 
 @section('contenido')
  <!-----Vista busqueda cliente-------->
<fieldset class='form'>
	<br>
	<div align='center'>
		<h2>Resultado de busqueda Empleado</h2>
	</div>
	<hr>
	<br><br>
	<div align='center'>
	<form class="was-validated" action='' method='POST'>
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr class="table-info">
							<th scope="col">ID</th>
							<th scope="col">FOTO</th>
							<th scope="col">NOMBRE DEL CLIENTE</th>
							<th scope="col">DIRECCIÓN</th>
							<th scope="col">CURP</th>
							<th scope="col">CORREO</th>
							<th scope="col">TELEFONO</th>
							<th scope="col">OPCIONES</th>
						</tr>
					</thead>
					@foreach($clientes as $cl)
						<tr>
							<td>{{$cl->id_cliente}}</td>
							<td>
								<img src="{{asset('Images/'.$cl->archivo)}}" heigth=50 width=50>
							</td>
							<td>{{$cl->nom_cliente}} {{$cl->ap_cliente}} {{$cl->am_cliente}}</td>
							<td>{{$cl->calle}} {{$cl->num_interior}}, {{$cl->num_exterior}}, {{$cl->localidad}}</td>
							<td>{{$cl->curp_cliente}}</td>
							<td>{{$cl->correo}}</td>
							<td>{{$cl->telefono}}</td>
							<td>
							@if($cl->deleted_at=="")
							<a href="">Desactivar</a> 
							/ <a href="{{URL::action('Controller_cliente@mcliente',['id_cliente'=>$cl->id_cliente])}}">Modificar</a>
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