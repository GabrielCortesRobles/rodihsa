<fieldset class='form'>
	<div class="modal fade" id="alta_entrada" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<form class="was-validated" action="{{route('altaentrada')}}" name='formulario' method='POST' enctype='multipart/form-data'>
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Registra una entrada</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						{{csrf_field()}}
						<div class="col-md-14">
								<label>*Proveedor :</label>
								<select class="custom-select" name='id_proveedor' required>
									@foreach($proveedores as $prov)
											<option value='{{$prov->id_proveedor}}'>{{$prov->nom_proveedor}}</option>
									@endforeach
								</select>
						</div>
				
						<div class="col-md-14">
								<label>*Empleado :</label>
								<select class="custom-select" name='id_empleado' required>
									@foreach($empleados as $emp)
									<option value='{{$emp->id_empleado}}'>{{$emp->nom_empleado}} {{$emp->ap_empleado}} {{$emp->am_empleado}}</option>
									@endforeach
								</select>
						</div>
				
						<div class="col-md-6">
							<label>*Total :</label>
							<input type="text" class="form-control is-valid" placeholder="Ingresa el total " name='total' value="{{old('total')}}"  id='' required>
							@if($errors->first('total'))
								<i>{{$errors->first('total')}}</i>
							@endif
						</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary" value='Enviar' id='enviar_entrada'>
					</div>
				</form>
				<div>
					<b>Los campos con * son obligatorios.</b>
				</div>
			</div>
		</div>
	</div>
</fieldset>