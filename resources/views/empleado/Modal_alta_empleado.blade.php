<!-- Modal alta empleado -->
<fieldset class='form' id='fieldset'>
<div class="modal fade" id="alta_empleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document" id='1'>
    <div class="modal-content" id='2'>
      <div class="modal-header" >
        <h5 class="modal-title" id="exampleModalLongTitle">Alta Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form class="was-validated" action="{{route('altaempleado')}}" name='formulario' method='POST' enctype='multipart/form-data'>
		{{csrf_field()}}
    <div class="col-md-14">
      <label>*Nombre :</label>
      <input type="text" class="form-control is-valid" id="" placeholder="Ingresa Nombre" name='nom_empleado' value="{{old('nom_empleado')}}" required>
		@if($errors->first('nom_empleado'))
			<i>{{$errors->first('nom_empleado')}}</i>
		@endif
    </div>
	
	<div class="row">
    <div class="col-md-6">
      <label>*Apellido paterno :</label>
      <input type="text" class="form-control is-valid" id="" placeholder="Apellido paterno" name='ap_empleado' value="{{old('ap_empleado')}}" required>
	  @if($errors->first('ap_empleado'))
			<i>{{$errors->first('ap_empleado')}}</i>
		@endif
    </div>
	
	<div class="col-md-6">
		<label>*Apellido Materno :</label>
		<input type="text" class="form-control is-valid" id="" placeholder="Apellido materno" name='am_empleado' value="{{old('am_empleado')}}" required>
		@if($errors->first('am_empleado'))
			<i>{{$errors->first('am_empleado')}}</i>
		@endif
    </div>
	</div>
	
	<div class="row">
    <div class="col-md-6">
      <label>*CURP :</label>
      <input type="text" class="form-control is-valid" id="" placeholder="CURP" name='curp_empleado' value="{{old('curp_empleado')}}" required>
		@if($errors->first('curp_empleado'))
			<i>{{$errors->first('curp_empleado')}}</i>
		@endif
    </div>
	
	<div class="col-md-6">
		<label>*RFC :</label>
		<input type="text" class="form-control is-valid" id="" placeholder="RFC" name='rfc_empleado' value="{{old('rfc_empleado')}}" required>
		@if($errors->first('rfc_empleado'))
			<i>{{$errors->first('rfc_empleado')}}</i>
		@endif
    </div>
	</div>
	
	<div class="row">	
		<div class="col-md-6">
			<label>*Fecha de nacimiento :</label>
			<input type="date" class="form-control is-valid" id="" name='fecha_nacimiento' value="{{old('fecha_nacimiento')}}" required>
		</div>
		<div class="col-md-6">
			<label>Imagen de perfil :</label>
			<input type="file" class="form-control is-valid" name='archivo'>
		</div>
	</div>
	
	<div class="col-md-14">
      <label>*Calle :</label>
      <input type="text" class="form-control is-valid" id="" placeholder="Nombre de la calle" name='calle' value="{{old('calle')}}" required>
	  @if($errors->first('calle'))
			<i>{{$errors->first('calle')}}</i>
		@endif
    </div>
	
	<div class="row">
    <div class="col-md-3">
      <label>*N. interno :</label>
      <input type="text" class="form-control is-valid" id="" placeholder="Num. interno" name='num_interior' value="{{old('num_interior')}}" required>
	  @if($errors->first('num_interior'))
			<i>{{$errors->first('num_interior')}}</i>
		@endif
    </div>
	
    <div class="col-md-3">
      <label>*N. externo :</label>
      <input type="text" class="form-control is-valid" id="" placeholder="Num. externo" name='num_exterior' value="{{old('num_exterior')}}" required>
	  @if($errors->first('num_exterior'))
			<i>{{$errors->first('num_exterior')}}</i>
		@endif
    </div>

    <div class="col-md-6">
      <label>*Localidad :</label>
      <input type="text" class="form-control is-valid" id="" placeholder="Nombre de la localidad" name='localidad' value="{{old('localidad')}}" required>
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

	<div class="row">
    <div class="col-md-6">
      <label>*Correo electronico :</label>
      <input type="text" class="form-control is-valid" id="" placeholder="Correo electronico" name='correo' value="{{old('correo')}}" required>
		@if($errors->first('correo'))
			<i>{{$errors->first('correo')}}</i>
		@endif
    </div>	
	
    <div class="col-md-6">
      <label>*Telefono :</label>
      <input type="text" class="form-control is-valid" id="" placeholder="Telefono" name='telefono' value="{{old('telefono')}}" required>
		@if($errors->first('telefono'))
			<i>{{$errors->first('telefono')}}</i>
		@endif
    </div>
  </div>

  	<div class="row">
  <div class="col-md-6">
	<label>*Departamento :</label>
    <select class="custom-select" name='id_departamento' required>
		@foreach($departamentos as $dep)
				<option value='{{$dep->id_departamento}}'>{{$dep->departamento}}</option>
		@endforeach
    </select>
  </div>
  
  	<div class="col-md-3">
	*Sexo :
    <div class="custom-control custom-radio">
		<input type="radio" class="custom-control-input" id="sexo1" name="sexo" value='Hombre' checked>
		<label class="custom-control-label" for="sexo1">Hombre</label>
	</div>
	<div class="custom-control custom-radio mb-3">
		<input type="radio" class="custom-control-input" id="sexo" name="sexo" value='Mujer'>
		<label class="custom-control-label" for="sexo">Mujer</label>
		<div class="invalid-feedback">Seleccione su sexo, por favor</div>
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
	</div>
	
	<div>
		<label>Desea crear una cuenta de usuario para este empleado.</label>
		<div class="col-md-2">
			<input type="button" class="btn btn-success" value="Crear cuenta" name="cuenta" id="cuenta">
		</div>
	</div>
	
	<div id="permisos" name='permisos' hidden>
	<label>Configuracion de cuenta de usuario. (opcional).</label>
		<div class='row'>
			<div class='col-md-6'>
				<label>Contraseña :</label>
				<input type='password' class='form-control is-valid' id='contrasena' placeholder='Contraseña' name='contrasena' >
			</div>
		</div>
		<label>Seleccione privilegios los para el empleado. (opcional).</label>
		<div class='form-check'>
				<input type='checkbox' class='form-check-input' value='1' name='privilegio_venta' id='privilegio_venta'>
				<label class='form-check-label' for='privilegio_venta'>Venta</label>
		</div>
			
		<div class='form-check'>
				<input type='checkbox' class='form-check-input' value='1' name='privilegio_almacen' id='privilegio_almacen'>
				<label class='form-check-label' for='privilegio_almacen'>Almacen</label>
		</div>

		<div class='form-check'>
				<input type='checkbox' class='form-check-input' value='1' name='privilegio_caja' id='privilegio_caja'>
				<label class='form-check-label' for='privilegio_caja'>Caja</label>
		</div>
	
	</div>
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value='Enviar' id='enviar_empleado'>
      </div>
	</form>
	  <div>
	  <b>Los campos con * son obligatorios.</b>
	  </div>
	  </div>
  </div>
</div>
</fieldset>