@extends('header.header') 
@section('contenido')
	<fieldset>
		<form class="was-validated" action = "{{route('actualizaproducto')}}" method='POST' enctype="multipart/form-data">
		{{csrf_field()}}
			<div class='formulario'>
				<div align='center'>
				<h2>Modificacion Producto</h2>
				</div>
				<hr>
				<div class="col-md-12">
					<input type="text" class="form-control is-valid" id="" placeholder="Ingresa nombre del producto" name='id_producto' hidden value='{{$mproducto->id_producto}}' >
				</div>
				
					@if($errors->first('archivo')) 
					<i> {{ $errors->first('archivo') }} </i> 
					@endif	<br>
					<img src="{{asset('Images/'.$mproducto->archivo)}}" heigth=50 width=50>
					<br>
					Seleccione archivo <input type ='file' name='archivo'>
					<br>
	
				<div class='row'>
					<div class="col-md-6">
					  <label>Nombe del producto :</label>
					  <input type="text" class="form-control is-valid" id="" placeholder="Ingresa nombre del producto" name='nom_producto' value='{{$mproducto->nom_producto}}' required>
					@if($errors->first('nom_producto'))
						<i>{{$errors->first('nom_producto')}}</i>
					@endif
					</div>
					
					<div class="col-md-6">
					  <label>Marca :</label>
					  <input type="text" class="form-control is-valid" id="" placeholder="Ingresa su marca" name='marca' value='{{$mproducto->marca}}' required>
					@if($errors->first('marca'))
						<i>{{$errors->first('marca')}}</i>
					@endif
					
					</div>
				</div>
	
				<div class='row'>
					<div class="col-md-6">
						<label>*Proveedor :</label>
						<select class="custom-select" name='id_proveedor' required>
							@foreach($proveedores as $prov)
									<option value='{{$prov->id_proveedor}}'>{{$prov->nom_proveedor}}</option>
							@endforeach
						</select>
					</div>
	
					<div class="col-md-6">
					  <label>Codigo interno :</label>
					  <input type="text" class="form-control is-valid" id="" placeholder="Ingresa su codigo interno" name='codigo' value='{{$mproducto->codigo}}' required>
					  @if($errors->first('codigo'))
						<i>{{$errors->first('codigo')}}</i>
					@endif
					</div>
				</div>
	
				<div class='row'>
					<div class="col-md-6">
						<label>codigo del SAT :</label>
						<input type="text" class="form-control is-valid" id="" placeholder="Ingresa el codigo del SAT" name='codigo_sat' value='{{$mproducto->codigo_sat}}' required>
						@if($errors->first('codigo_sat'))
						<i>{{$errors->first('codigo_sat')}}</i>
					@endif
					</div>
					
					<div class="col-md-6">
						<label for="customControlValidation4">Cantidad:</label>
						<input type="text" class="form-control is-valid" id="" placeholder="Ingresa su cantidad" name='existencia' value='{{$mproducto->existencia}}' required>
						@if($errors->first('existencia'))
						<i>{{$errors->first('existencia')}}</i>
					@endif
					</div>
				</div>
	
				<div class="col-md-14">
					<label for="customControlValidation4">Descripción :</label>
					<input type="text" class="form-control is-valid" id="" placeholder="Ingresa una descripción" name='descripcion' value='{{$mproducto->descripcion}}'>
					@if($errors->first('descripcion'))
						<i>{{$errors->first('descripcion')}}</i>
					@endif
				</div>
	
				<div class='row'>
					<div class="col-md-6">
					  <label for="customControlValidation4">*Precio por pieza :</label>
					  <input type="text" class="form-control is-valid" id="" placeholder="Ingresa precio por pieza" name='precio_cu' value='{{$mproducto->precio_cu}}' required>
					  @if($errors->first('precio_cu'))
						<i>{{$errors->first('precio_cu')}}</i>
					@endif
					</div>
				</div>
	
				<div class='row'>
					<div class="col-md-6">
					  <label for="customControlValidation4">*Precio mediomayoreo :</label>
					  <input type="text" class="form-control is-valid" id="" placeholder="Ingresa precio de menudeo" name='precio_menudeo' value='{{$mproducto->precio_menudeo}}' required>
					  @if($errors->first('precio_menudeo'))
						<i>{{$errors->first('precio_menudeo')}}</i>
					@endif
					</div>
					
					<div class="col-md-6">
					  <label for="customControlValidation4">*A partir de:</label>
					  <input type="number" class="form-control is-valid" id="" placeholder="Piezas medio mayoreo" name='piezas_mediomayoreo' value='{{$mproducto->piezas_mediomayoreo}}' required>
					@if($errors->first('piezas_mediomayoreo'))
						<i>{{$errors->first('piezas_mediomayoreo')}}</i>
					@endif
					</div>
				</div>
	
				<div class='row'>
					<div class="col-md-6">
					  <label>*Precio mayoreo :</label>
					  <input type="text" class="form-control is-valid" id="" placeholder="Ingresa precio de mayoreo" name='precio_mayoreo' value='{{$mproducto->precio_mayoreo}}' required>
					@if($errors->first('precio_mayoreo'))
						<i>{{$errors->first('precio_mayoreo')}}</i>
					@endif
					</div>
					
					<div class="col-md-6">
					  <label for="customControlValidation4">* Apartir de:</label>
					  <input type="text" class="form-control is-valid" id="" placeholder="Piezas de mayoreo" name='piezas_mayoreo' value='{{$mproducto->piezas_mayoreo}}' required>
					@if($errors->first('piezas_mayoreo'))
						<i>{{$errors->first('piezas_mayoreo')}}</i>
					@endif
					</div>
				</div>
	
				
				<div class="col-md-3">
					*Activo :
					<div class="custom-control custom-radio">
						<input type="radio" class="custom-control-input" id="activo1" value="Si" name="activo" checked>
						<label class="custom-control-label" for="activo1">SI</label>
					</div>
					<div class="custom-control custom-radio mb-3">
						<input type="radio" class="custom-control-input" id="activo" value="No" name="activo">
						<label class="custom-control-label" for="activo">NO</label>
						<div class="invalid-feedback">Selecciona una opcion, por favor</div>
					</div>
				</div>
	
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" value='Enviar'>
				</div>
			</div>
		</form>
	</fieldset>
	@stop

