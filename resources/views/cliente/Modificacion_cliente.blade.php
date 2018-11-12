@extends('header.header') 
@section('contenido')
		<fieldset>
		<!-----Formulario modificación cliente----->
			<form class="was-validated" action ="{{route('actualizacliente')}}"  method='POST' enctype="multipart/form-data">
				{{csrf_field()}}
				<div class='formulario'>
					<div align='center'>
						<h2>Modificacion Cliente</h2>
					</div>
					<hr>
					<div class="col-md-14"  hidden>
						<label>ID :</label>
						<input type="text" class="form-control is-valid" id="" placeholder="Ingresa id del cliente" name='id_cliente' value='{{$mcliente->id_cliente}}'>
					</div>
					
					<div class="col-md-14">
						<label>RFC:</label>
						<input type="text" class="form-control is-valid" id="" placeholder="Ingresa id del cliente" name='rfc_cliente' value='{{$mcliente->rfc_cliente}}'>
						@if($errors->first('rfc_cliente'))
						<i>{{$errors->first('rfc_cliente')}}</i>
						@endif
					</div>
					
					<div class="col-md-14">
						<label>Nombre :</label>
						<input type="text" class="form-control is-valid" id="" placeholder="Ingresa Nombre" name='nom_cliente' value='{{$mcliente->nom_cliente}}' required>
						@if($errors->first('nom_cliente'))
						<i>{{$errors->first('nom_cliente')}}</i>
						@endif
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<label>Apellido paterno :</label>
							<input type="text" class="form-control is-valid" id="" placeholder="Apellido paterno" name='ap_cliente' value='{{$mcliente->ap_cliente}}' required>
						@if($errors->first('ap_cliente'))
						<i>{{$errors->first('ap_cliente')}}</i>
						@endif
						</div>
						
						<div class="col-md-6">
							<label>Apellido Materno :</label>
							<input type="text" class="form-control is-valid" id="" placeholder="Apellido materno" name='am_cliente' value='{{$mcliente->am_cliente}}' required>
						</div>
						@if($errors->first('am_cliente'))
						<i>{{$errors->first('am_cliente')}}</i>
						@endif
					</div>
					
					<div class="col-md-14">
						<label>Calle :</label>
						<input type="text" class="form-control is-valid" id="" placeholder="Nombre de la calle" name='calle' value='{{$mcliente->calle}}' required>
						@if($errors->first('calle'))
						<i>{{$errors->first('calle')}}</i>
						@endif
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<label>Número interior :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Numero de la calle" name='numero_interior' value='{{$mcliente->num_interior}}' required>
						@if($errors->first('num_interior'))
						<i>{{$errors->first('num_interior')}}</i>
						@endif
						</div>
						
						<div class="col-md-6">
							<label>Número exterior :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Numero de la calle" name='numero_exterior' value='{{$mcliente->num_exterior}}' required>
						</div>
						@if($errors->first('num_exterior'))
						<i>{{$errors->first('num_exterior')}}</i>
						@endif
					</div>

						<div class="col-md-14">
							<label>Localidad :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Nombre de la localidad" name='localidad' value='{{$mcliente->localidad}}' required>
							@if($errors->first('localidad'))
							<i>{{$errors->first('localidad')}}</i>
							@endif
						</div>
					
					<div class="row">
						<div class="col-md-8">
							<label>*Municipio :</label>
							<select class="custom-select" name='id_municipio' required>
								@foreach($municipios as $mun)
										<option value='{{$mun->id_municipio}}'>{{$mun->municipio}}</option>
								@endforeach
							</select>
						</div>
						
						<div class="col-md-4">
							<label>Codigo postal :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Codigo postal" name='cp' value='{{$mcliente->cp}}' required>
							@if($errors->first('cp'))
							<i>{{$errors->first('cp')}}</i>
							@endif
						</div>						
					</div>

					<div class="row">
						<div class="col-md-6">
							<label>Correo electronico :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Correo electronico" name='correo' value='{{$mcliente->correo}}' required>
							@if($errors->first('correo'))
							<i>{{$errors->first('correo')}}</i>
							@endif
						</div>	
						
						<div class="col-md-6">
							<label>Telefono :</label>
							<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Telefono" name='telefono' value='{{$mcliente->telefono}}' required>
							@if($errors->first('telefono'))
							<i>{{$errors->first('telefono')}}</i>
							@endif
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							Sexo :
							<div class="custom-control custom-radio">
								<input type="radio" class="custom-control-input" id="customControlValidation6" name="sexo" value='Hombre' checked>
								<label class="custom-control-label" for="customControlValidation6">Hombre</label>
							</div>
							<div class="custom-control custom-radio mb-3">
								<input type="radio" class="custom-control-input" id="customControlValidation5" name="sexo" value='Mujer'>
								<label class="custom-control-label" for="customControlValidation5">Mujer</label>
								<div class="invalid-feedback">Seleccione su sexo, por favor</div>
							</div>
						</div>
						
						<div class="col-md-6">
							Activo :
							<div class="custom-control custom-radio">
								<input type="radio" class="custom-control-input" id="customControlValidation2" name="activo" value='1' checked>
								<label class="custom-control-label" for="customControlValidation2">SI</label>
							</div>
							<div class="custom-control custom-radio mb-3">
								<input type="radio" class="custom-control-input" id="customControlValidation3" name="activo" value='0'>
								<label class="custom-control-label" for="customControlValidation3">NO</label>
								<div class="invalid-feedback">Selecciona una opcion, por favor</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" value='Enviar'>
					</div>
				</div>



			</form>
		</fieldset>
	</body>
</html>