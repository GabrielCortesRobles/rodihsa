@extends('header.header') 
@section('contenido')
<br>
<div id='formulario'>
	<div class='col-md-6'>
		<div class="card">
		<h5 class="card-header" align='center'>Modificación Proveedor</h5>
			<div class="card-body">
	<!-----------------Formulario modificación empleado----------------->
				<form class="was-validated" action = "{{route('actualizaproveedor')}}" method='POST' enctype="multipart/form-data">
				{{csrf_field()}}
						<div class="col-md-12"  hidden>
							<label>ID :</label>
							<input type="text" class="form-control is-valid" id="" name='id_proveedor' value='{{$mproveedor->id_proveedor}}'>
						</div>
						
						<div class="col-md-14">
								<label>*RFC :</label>
								<input type="text" class="form-control is-valid" id="" placeholder="RFC" name='rfc_proveedor' value="{{$mproveedor->rfc_proveedor}}" required>
								@if($errors->first('rfc_proveedor'))
									<i>{{$errors->first('rfc_proveedor')}}</i>
								@endif
							</div>
					
						<div class="col-md-14">
							<label>*Nombre :</label>
							<input type="text" class="form-control is-valid" id="" placeholder="Ingresa Nombre" name='nom_proveedor' value="{{$mproveedor->nom_proveedor}}" required>
								@if($errors->first('nom_proveedor'))
									<i>{{$errors->first('nom_proveedor')}}</i>
								@endif
						</div>
							
							
						<br>	
						<div class="row">
							<div class='col-md-2'>
								foto actual
								<img class="card-img-top" src="{{asset('Images/'.$mproveedor->archivo)}}" style="width: 50px;">
							</div>	
							
							Seleccione archivo <input type ='file' name='archivo'>
							<br>
								@if($errors->first('archivo')) 
									<i> {{ $errors->first('archivo') }} </i> 
								@endif	
						</div>
						<br>
						<div class="col-md-14">
							<label>*Calle :</label>
							<input type="text" class="form-control is-valid" id="" placeholder="Nombre de la calle" name='calle' value="{{$mproveedor->calle}}" required>
							@if($errors->first('calle'))
								<i>{{$errors->first('calle')}}</i>
							@endif
						</div>
				
						<div class="row">
							<div class="col-md-6">
								<label>*N. interno :</label>
								<input type="text" class="form-control is-valid" id="" placeholder="Num. interno" name='num_interior' value="{{$mproveedor->num_interior}}" required>
								@if($errors->first('num_interior'))
									<i>{{$errors->first('num_interior')}}</i>
								@endif
							</div>
							
							<div class="col-md-6">
								<label>*N. externo :</label>
								<input type="text" class="form-control is-valid" id="" placeholder="Num. externo" name='num_exterior' value="{{$mproveedor->num_exterior}}" required>
								@if($errors->first('num_exterior'))
									<i>{{$errors->first('num_exterior')}}</i>
								@endif
							</div>

							
						</div>
				
						<div class="row">
							
							<div class="col-md-6">
								<label>*Localidad :</label>
								<input type="text" class="form-control is-valid" id="" placeholder="Nombre de la localidad" name='localidad' value="{{$mproveedor->localidad}}" required>
								@if($errors->first('localidad'))
									<i>{{$errors->first('localidad')}}</i>
								@endif
							</div>
							
							<div class="col-md-6">
								<label>*Codigo postal :</label>
								<input type="text" class="form-control is-valid" id="" placeholder="Codigo postal" name='cp' value="{{$mproveedor->cp}}" required>
									@if($errors->first('cp'))
										<i>{{$errors->first('cp')}}</i>
									@endif
							</div>	
						</div>
						
						<div class="col-md-14">
								<label>*Municipio :</label>
								<select class="custom-select" name='id_municipio' required>
									@foreach($municipios as $mun)
											<option value='{{$mun->id_municipio}}'>{{$mun->municipio}}</option>
									@endforeach
								</select>
							</div>

						<div class="row">
							<div class="col-md-6">
								<label>*Correo electronico :</label>
								<input type="text" class="form-control is-valid" id="" placeholder="Correo electronico" name='correo' value="{{$mproveedor->correo}}" required>
								@if($errors->first('correo'))
									<i>{{$errors->first('correo')}}</i>
								@endif
							</div>	
							
							<div class="col-md-6">
								<label>*Telefono :</label>
								<input type="text" class="form-control is-valid" id="" placeholder="Telefono" name='telefono' value="{{$mproveedor->telefono}}" required>
								@if($errors->first('telefono'))
									<i>{{$errors->first('telefono')}}</i>
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
							<a role="button" class="btn btn-danger" href="{{URL::action('Controller_proveedor@reporteproveedor')}}">Cancelar</a>
							<input type="submit" class="btn btn-primary" value='Enviar'>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>
<br>
@stop