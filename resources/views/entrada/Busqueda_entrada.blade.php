 @extends('header.header') 
 @section('contenido')
  <!-----Vista busqueda entiente-------->
<fieldset class='form'>
	<br>
	<div align='center'>
		<h2>Resultado de busqueda Entrada Almacen</h2>
	</div>
	<br><br>
<form class="was-validated" action='' method='POST'>
	<div align='center'>
		
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr class="table-info">
								<th scope="col">ID</th>
								<th scope="col">NOMBRE PROVEEDOR</th>
								<th scope="col">NOMBRE DEL EMPLEADO</th>
								<th scope="col">TOTAL</th>
								<th scope="col">OPCIONES</th>
							</tr>
						</thead>
						@foreach($entradas as $ent)
							<tr>
								<td>{{$ent->id_entrada}}</td>
								<td>{{$ent->nom_proveedor}} </td>
								<td>{{$ent->nom_empleado}} {{$ent->ap_empleado}} {{$ent->am_empleado}}</td>
								<td>{{$ent->total}}</td>
								<td>
								@if($ent->deleted_at=="")
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
		
		</form>
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