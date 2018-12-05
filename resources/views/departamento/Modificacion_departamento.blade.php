@extends('header.Header') 
@section('contenido')
<br>
<div id='formulario'>
	<div class='col-md-6'>
		<div class="card">
		<h5 class="card-header" align='center'>Modificación Proveedor</h5>
			<div class="card-body">
	<!-----------------Formulario modificación departamentos----------------->
	<form class="was-validated" action = "{{route('actualizadepartamento')}}" method='POST' enctype="multipart/form-data">
	{{csrf_field()}}
		<div class='formulario'>
			<div align='center'>
			<h2>Modificación Departamentos</h2>
			</div>
			<hr>
			<div class="col-md-12" >
				<label>ID :</label>
				<input type="text" class="form-control is-valid" id="" name='id_departamento' value='{{$mdepartamento->id_departamento}}'>
			</div>
			
			<div class="col-md-14">
					<label>*Nombre departamento :</label>
					<input type="text" class="form-control is-valid" id="" placeholder="RFC" name='departamento' value="{{$mdepartamento->departamento}}" required>
					@if($errors->first('departamento'))
						<i>{{$errors->first('departamento')}}</i>
					@endif
			</div>
			<br>	
			<div class="col-md-14">	
				@if($errors->first('archivo')) 
					<i> {{ $errors->first('archivo') }} </i> 
					@endif	<br>
					<img src="{{asset('Images/'.$mdepartamento->archivo)}}" heigth=50 width=50>
					<br>
					Seleccione archivo <input type ='file' name='archivo'>
					<br>
			</div>
			<br>
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
			</div>
		</div>
	</div>
</div>
@stop