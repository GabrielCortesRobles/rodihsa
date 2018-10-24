<fieldset class='form'>
	<div class="modal fade" id="alta_producto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<form class="was-validated" action="{{route('guardaproducto')}}" name='formulario' method='POST' enctype='multipart/form-data'>
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Registra un Cliente</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						{{csrf_field()}}
						<div class="col-md-8">
								<label>*Proveedor :</label>
								<select class="custom-select" required>
									@foreach($proveedores as $prov)
											<option value='{{$prov->id_proveedor}}'>{{$prov->nom_proveedor}}</option>
									@endforeach
								</select>
							</div>
				
						<div class="col-md-14">
								<label>*Nombre del producto :</label>
								<input type="text" class="form-control is-valid" placeholder="Ingresa nombre del producto" name='nom_producto' value="{{old('nom_producto')}}"  id='' required>
								@if($errors->first('nom_producto'))
									<i>{{$errors->first('nom_producto')}}</i>
								@endif
						</div>
						
						<div class="col-md-14">
							<label>Imagen de perfil :</label>
							<input type="file" class="form-control is-valid" name='archivo'>
						</div>
				
						<div class='row'>
							<div class="col-md-6">
								<label>*Marca :</label>
								<input type="text" class="form-control is-valid" placeholder="Ingresa la marca" name='marca' value="{{old('marca')}}"  id='' required>
								@if($errors->first('marca'))
									<i>{{$errors->first('marca')}}</i>
								@endif
							 </div>
							
							<div class="col-md-6">
							  <label>*Código interno: </label>
							  <input type="text" class="form-control is-valid" placeholder="Ingresa el código interno" name='codigo' value="{{old('codigo')}}" id='' required>
								@if($errors->first('codigo'))
									<i>{{$errors->first('codigo')}}</i>
								@endif
							</div>
						</div>

						<div class='row'>
							<div class="col-md-6">
								<label>*Código SAT:</label>
								<input type="text" class="form-control is-valid" placeholder="Ingresa el código SAT" name='codigo_sat' value="{{old('codigo_sat')}}" id='' required>
								@if($errors->first('codigo_sat'))
									<i>{{$errors->first('codigo_sat')}}</i>
								@endif
							</div>
						
							<div class="col-md-6">
								<label>*Cantidad:</label>
								<input type="text" class="form-control is-valid" id="" name='existencia' value="{{old('existencia')}}"  id='' required>
								@if($errors->first('existencia'))
									<i>{{$errors->first('existencia')}}</i>
								@endif 
							</div>
						</div>
				
				
						<div class="col-md-14">
							<label>*Descripción:</label>
							<input type="text" class="form-control is-valid" placeholder="Ingresa la descripción del producto" name='descripcion' id='' value="{{old('descripcion')}}" required>
							@if($errors->first('descripcion'))
								<i>{{$errors->first('descripcion')}}</i>
							@endif 
						</div>		
				
				
						<div class='row'>
						
							<div class="col-md-14">
								<label>*Precio unitario:</label>
								<input type="text" class="form-control is-valid" placeholder="Ingresa el precio unitario" name='precio_cu' id='' value="{{old('precio_cu')}}" required>
									@if($errors->first('precio_cu'))
										<i>{{$errors->first('precio_cu')}}</i>
									@endif 
							</div>
						</div>
				
						<div class='row'>
							<div class="col-md-6">
							   <label for="customControlValidation4">*Precio mediomayoreo :</label>
							   <input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa precio de menudeo" name='precio_menudeo' value="{{old('precio_menudeo')}}" required>
								@if($errors->first('precio_menudeo'))
									<i>{{$errors->first('precio_menudeo')}}</i>
								@endif
							</div>
						
							<div class="col-md-6">
								<label for="customControlValidation4">*A partir de:</label>
								<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Piezas medio mayoreo" name='piezas_mediomayoreo'  value="{{old('piezas_mediomayoreo')}}" required>
								@if($errors->first('piezas_mediomayoreo'))
									<i>{{$errors->first('piezas_mediomayoreo')}}</i>
								@endif
							</div>
						</div>
						
							<div class='row'>
								<div class="col-md-6">
									<label>*Precio mayoreo :</label>
									<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Ingresa precio de mayoreo" name='precio_mayoreo' value="{{old('precio_mayoreo')}}" required>
									@if($errors->first('precio_mayoreo'))
									<i>{{$errors->first('precio_mayoreo')}}</i>
									@endif
								</div>
							
								<div class="col-md-6">
									<label for="customControlValidation4">* Apartir de:</label>
									<input type="text" class="form-control is-valid" id="customControlValidation4" placeholder="Piezas de mayoreo" name='piezas_mayoreo' value="{{old('piezas_mayoreo')}}" required>
									@if($errors->first('piezas_mayoreo'))
									<i>{{$errors->first('piezas_mayoreo')}}</i>
									@endif
								</div>
							</div>
							
							<div class='row'>
								
				
							
							<div class="col-md-6">
								*Activo:
								<div class="custom-control custom-radio">
									<input type="radio" class="custom-control-input" name="activo" id='' value='Activo' checked>
									<label class="custom-control-label" for="activo_cli1">Si</label>
								</div>
								<div class="custom-control custom-radio mb-3">
									<input type="radio" class="custom-control-input"  name="activo" id='' value='Activo'>
									<label class="custom-control-label" for="activo_cli">No</label>
								</div>
							</div>
							</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary" value='Enviar' id='enviar_cliente'>
					</div>
				</form>
				<div>
					<b>Los campos con * son obligatorios.</b>
				</div>
			</div>
		</div>
	</div>
</fieldset>