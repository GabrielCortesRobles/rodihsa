@extends('header.header') 
 @section('contenido')
  <!-----Vista busqueda empleado-------->
<fieldset class='form'>
	<br>
	<div align='center'>
		<h2>Resultado de busqueda Departamento</h2>
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
							<th scope="col">DEPARTAMENTO</th>
							<th scope="col">OPCIONES</th>
						</tr>
					</thead>
					@foreach($departamentos as $dep)
						<tr>
							<td>{{$dep->id_departamento}}</td>
							<td>
							<img src="{{asset('Images/'.$dep->archivo)}}" heigth=50 width=50>
							</td>
							<td>{{$dep->departamento}}</td>
							<td>
							@if($dep->deleted_at=="")
							<a href="{{URL::action('Controller_departamentos@eliminad',['id_departamento'=>$dep->id_departamento])}}">Desactivar</a> 
							/<a href="{{URL::action('Controller_departamentos@mdepartamento',['id_departamento'=>$dep->id_departamento])}}">Modificar</a>
							@else
							<a href="{{URL::action('Controller_departamentos@restaurad',['id_departamento'=>$dep->id_departamento])}}"> Activar</a>/
							<a href="{{URL::action('Controller_departamentos@efisicad',['id_departamento'=>$dep->id_departamento])}}"> Eliminar</a>
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