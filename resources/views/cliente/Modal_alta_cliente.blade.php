<!-- Modal alta cliente -->
<!-- Esto es una prueba para el funcionamiento de git -->
<fieldset class='form'>
<div class="modal fade" id="alta_cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Registra un Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form class="was-validated">

	<div class="col-md-14">
			<label>*RFC:</label>
			<input type="text" class="form-control is-valid" placeholder="Ingresa su RFC" name='rfc_cliente' value="{{old('rfc_cliente')}}" id='rfc_cliente' required>
		@if($errors->first('rdf_cliente'))
				<i>{{$errors->first('rfc_cliente')}}</i>
			@endif
		</div>
	
    <div class="col-md-14">
      <label>*Nombre del cliente :</label>
      <input type="text" class="form-control is-valid" placeholder="Ingresa nombre del cliente" name='nom_cliente' value="{{old('nom_cliente')}}"  id='nom_cliente' required>
			@if($errors->first('nom_cliente'))
				<i>{{$errors->first('nom_cliente')}}</i>
			@endif
		</div>
	
	<div class='row'>
    <div class="col-md-6">
      <label>*Apellido Paterno :</label>
      <input type="text" class="form-control is-valid" placeholder="Ingresa apellido paterno" name='ap_cliente' value="{{old('ap_cliente')}}"  id='ap_cliente' required>
			@if($errors->first('ap_cliente'))
				<i>{{$errors->first('ap_cliente')}}</i>
			@endif
	  </div>
	
    <div class="col-md-6">
      <label>*Apellido Materno: </label>
      <input type="text" class="form-control is-valid" placeholder="Ingresa apellido materno" name='am_cliente' value="{{old('am_cliente')}}" id='am_cliente' required>
    	@if($errors->first('am_cliente'))
				<i>{{$errors->first('am_cliente')}}</i>
			@endif
		</div>
	</div>

	<div class='row'>
		<div class="col-md-6">
			<label>*CURP:</label>
			<input type="text" class="form-control is-valid" placeholder="Ingresa su CURP" name='curp_cliente' value="{{old('curp_cliente')}}" id='curp_cliente' required>
			@if($errors->first('curp_cliente'))
				<i>{{$errors->first('curp_cliente')}}</i>
			@endif
		</div>
	
		<div class="col-md-6">
			<label>*Fecha de nacimiento:</label>
			<input type="date" class="form-control is-valid" id="fecha_nacimiento" name='fecha_nacimiento'value="{{old('fecha_nacimiento')}}"  id='fecha_nacimiento' required>
			@if($errors->first('fecha_nacimiento'))
				<i>{{$errors->first('fecha_nacimiento')}}</i>
			@endif 
		</div>
	</div>
	
	
		<div class="col-md-14">
			<label>*Calle:</label>
			<input type="text" class="form-control is-valid" placeholder="Ingresa su calle" name='calle' id='calle' required>
			@if($errors->first('calle'))
				<i>{{$errors->first('calle')}}</i>
			@endif 
		</div>		
	
	
	<div class='row'>
    <div class="col-md-6">
      <label>*Número interior:</label>
      <input type="text" class="form-control is-valid" placeholder="Ingrese su numero interior" name='num_interior' id='num_interior' required>
			@if($errors->first('num_interior'))
				<i>{{$errors->first('num_interior')}}</i>
			@endif 
	  </div>
	
    <div class="col-md-6">
      <label>*Número exterior:</label>
      <input type="text" class="form-control is-valid" placeholder="Ingrese su numero exterior" name='num_exterior' id='num_exterior' required>
			@if($errors->first('num_exterior'))
				<i>{{$errors->first('num_exterior')}}</i>
			@endif 
		</div>
	</div>
	
    <div class="col-md-14">
      <label>*Colonia:</label>
      <input type="text" class="form-control is-valid" placeholder="Ingresa su localidad" name='localida' id='localidad' required>
			@if($errors->first('localidad'))
				<i>{{$errors->first('localidad')}}</i>
			@endif 
		</div>
  
	
	
	<div class='row'>
    <div class="col-md-8">
      <label>*Municipio: </label>
      <select name='id_municipio'>
			@foreach($municipios as $mun)
				<option value='{{$mun->id_municipio}}'>{{$mun->municipio}}</option>
				@endforeach
				</select>
    </div>
	
	

    <div class="col-md-4">
      <label>*Código Postal: </label>
      <input type="text" class="form-control is-valid" placeholder="Ingresa su código postal" name='cp' id='cp' required>
			@if($errors->first('cp'))
				<i>{{$errors->first('localidad')}}</i>
			@endif
	</div>
	</div>
   
	
	
	<div class="row">
	 <div class="col-md-6">
      <label>*Correo: </label>
      <input type="text" class="form-control is-valid" placeholder="Ingresa su correo" name='correo_cli' id='correo_cli' required>
			@if($errors->first('correo'))
				<i>{{$errors->first('correo')}}</i>
			@endif
	  </div>
	
	<div class="col-md-6">
      <label>*Telefono: </label>
      <input type="text" class="form-control is-valid" placeholder="Ingresa su numero telefonico" name='telefono_cli' id='telefono_cli' required>
			@if($errors->first('telefono'))
				<i>{{$errors->first('telefono')}}</i>
			@endif
	  </div>
	</div>
	
	<div class="row">
<div class="col-md-6">
	*Sexo :
    <div class="custom-control custom-radio">
		<input type="radio" class="custom-control-input"  name="sexo" id='sexo_cli1' value='Hombre' checked>
		<label class="custom-control-label" for="sexo_cli1">Hombre</label>
	</div>
	<div class="custom-control custom-radio mb-3">
		<input type="radio" class="custom-control-input"  name="sexo" id='sexo_cli' value='Mujer'>
		<label class="custom-control-label" for="sexo_cli">Mujer</label>
		<div class="invalid-feedback">Seleccione su sexo, por favor</div>
	</div>
	</div>

	
	<div class="col-md-6">
	*Activo:
    <div class="custom-control custom-radio">
		<input type="radio" class="custom-control-input" name="activo" id='activo_cli1' checked>
		<label class="custom-control-label" for="activo_cli1">Si</label>
	</div>
	<div class="custom-control custom-radio mb-3">
		<input type="radio" class="custom-control-input"  name="activo" id='activo_cli'>
		<label class="custom-control-label" for="activo_cli">No</label>
		
	</div>
	</div>
	</div>
	</div>
	</form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value='Enviar' id='enviar_cliente'>
      </div>
	  <div>
	  <b>Los campos con * son obligatorios.</b>
	  </div>
	  </div>
	  </div>
  </div>
</fieldset>