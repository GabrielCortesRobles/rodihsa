<fieldset class='form'>
<!-- Modal -->
	<div class="modal fade" id="alta_proveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Registra un proveedor Proveedor</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="was-validated" action="{{route('altaproveedor')}}" method='POST'>
				{{csrf_field()}}
					<div class="modal-body">
						<div class="col-md-14">
							<label ="customControlValidation4">RFC*: </label>
							<input type="text" class="form-control is-valid" id="rfc_proveedor" placeholder="Ingresa su rfc" name='rfc_proveedor' value="{{old('rfc_proveedor')}}" required>
							@if($errors->first('rfc_proveedor'))
								<i>{{$errors->first('rfc_proveedor')}}</i>
							@endif
						</div>
						
						<div class="col-md-14">
							<label>*Nombre del proveedor: </label>
							<input type="text" class="form-control is-valid" id="nom_proveedor" placeholder="Ingresa nombre de la empresa" name='nom_proveedor' value="{{old('nom_proveedor')}}" required>
							@if($errors->first('nom_proveedor'))
								<i>{{$errors->first('nom_proveedor')}}</i>
							@endif
						</div>
						<div class="col-md-6">
							<label for="customControlValidation4">*Calle:</label>
							<input type="text" class="form-control is-valid" id="calle" placeholder="Nombre de la calle" name='calle' value="{{old('calle')}}" required>
							@if($errors->first('calle'))
								<i>{{$errors->first('calle')}}</i>
							@endif
						</div>
						
						<div class='row'>
							<div class="col-md-3">
								<label for="customControlValidation4">*No. interior:</label>
								<input type="text" class="form-control is-valid" id="num_interior" placeholder="Num. interno" name='num_interior' value="{{old('num_interior')}}" required>
								@if($errors->first('num_interior'))
									<i>{{$errors->first('num_interior')}}</i>
								@endif
							</div>
							<div class="col-md-3">
								<label for="customControlValidation4">*No.exterior:</label>
								<input type="text" class="form-control is-valid" id="num_exterior" placeholder="Num. externo" name='num_exterior' value="{{old('num_exterior')}}" required>
								@if($errors->first('num_exterior'))
									<i>{{$errors->first('num_exterior')}}</i>
								@endif
							</div>
							<div class="col-md-6">
								<label for="customControlValidation4">*Localidad:</label>
								<input type="text" class="form-control is-valid" id="localidad" placeholder="Nombre de la localidad" name='localidad' value="{{old('localidad')}}" required>
								@if($errors->first('localidad'))
									<i>{{$errors->first('localidad')}}</i>
								@endif
							</div>
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
								<label>*Codigo postal :</label>
								<input type="text" class="form-control is-valid" id="" placeholder="Codigo postal" name='cp' value="{{old('cp')}}" required>
									@if($errors->first('cp'))
										<i>{{$errors->first('cp')}}</i>
									@endif
							</div>	
						</div>
						
						<div class='row'>
							<div class="col-md-6">
								<label for="customControlValidation4">*Correo:</label>
								<input type="text" class="form-control is-valid" id="correo" placeholder="Ingresa el e-mail" name='correo' value="{{old('correo')}}" required>
								@if($errors->first('correo'))
									<i>{{$errors->first('correo')}}</i>
								@endif
							</div>
							
							<div class="col-md-6">
								<label for="customControlValidation4">*Telefono:</label>
								<input type="text" class="form-control is-valid" id="telefono" placeholder="Ingresa el num. telefonico" name='telefono' value="{{old('telefono')}}" required>
								@if($errors->first('telefono'))
									<i>{{$errors->first('telefono')}}</i>
								@endif
							</div>
						</div>
						
						<div class="col-md-3">
							*Activo :
							<div class="custom-control custom-radio">
								<input type="radio" class="custom-control-input" id="activo_prov1" value="Si" name="activo" checked>
								<label class="custom-control-label" for="activo_prov1">SI</label>
							</div>
							<div class="custom-control custom-radio mb-3">
								<input type="radio" class="custom-control-input" id="activo_prov" value="No" name="activo">
								<label class="custom-control-label" for="activo_prov">NO</label>
								<div class="invalid-feedback">Selecciona una opcion, por favor</div>
							</div>
						</div>
					</div>
				  
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<input type="submit" class="btn btn-primary" value='Enviar' id='enviar_proveedor'>
					</div>
				</form>
				<div>
					<b>Los campos con * son obligatorios.</b>
				</div>
			</div>
		</div>
	</div>
</fieldset>