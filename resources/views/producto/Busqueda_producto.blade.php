@extends('header.Header')
@section('contenido')
<fieldset class='form'>
	<br>
	<div align='center'>
		<h2>Resultado de busqueda Producto</h2>
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
						  <th scope="col">IMAGEN</th>
						  <th scope="col">NOMBRE DEL PRODUCTO</th>
						  <th scope="col">CÓDIGO INTERNO</th>
						  <th scope="col">EXISTENCIAS</th>
						  <th scope="col">PRECIO CU</th>
						  <th scope="col">PRECIO MENUDEO</th>
						  <th scope="col">PRECIO MAYOREO</th>
						  @if(Session::get('sesionprivilegio_admin')|Session::get('sesionprivilegio_almacen')=='1')
						  <th scope="col">OPCIONES</th>
							@endif
						</tr>
					</thead>
					@foreach($productos as $prod)
						<tr>
							<td>{{$prod->id_producto}}</td>
							<td>
								<img src="{{asset('Images/'.$prod->archivo)}}" heigth=50 width=50>
							</td>
							<td>{{$prod->nom_producto}}</td><td>{{$prod->codigo}}</td>
							<td>{{$prod->existencia}} </td>
							<td>{{$prod->precio_cu}}</td>
							<td>{{$prod->precio_menudeo}}</td>
							<td>{{$prod->precio_mayoreo}}</td>
							@if(Session::get('sesionprivilegio_admin')|Session::get('sesionprivilegio_almacen')=='1')
							<td>
							@if($prod->deleted_at=="")
							<a href="{{URL::action('Controller_productos@eliminapr',['id_producto'=>$prod->id_producto])}}">Desactivar</a> 
							/ <a href="{{URL::action('Controller_productos@mproducto',['id_producto'=>$prod->id_producto])}}">Modificar</a>
							@else
							<a href="{{URL::action('Controller_productos@restaurapr',['id_producto'=>$prod->id_producto])}}"> Activar</a>/
							<a href="{{URL::action('Controller_productos@efisicapr',['id_producto'=>$prod->id_producto])}}"> Eliminar</a>
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