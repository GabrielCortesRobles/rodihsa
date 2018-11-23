@extends('header.Header')
@section('contenido')
<div class='container'>
	<form class="was-validated" method='POST'>
		<fieldset class='form'>
			<h1 align="center">Venta de Productos</h1>
			<hr>
			<div class='form-check'>
				<input type='checkbox' class='form-check-input' name='facturar' id='facturar'>
				<label class='form-check-label' for='facturar'>¿Facturar?</label>
			</div>
			<div id='cliente' hidden>
				<h5>Datos Cliente</h5>
				<div class='row justify-content-md-center'>
					<div class="form-group row">
					
						<div class='col-md-2' >
							<label>Id_cliente:</label>
							<input type="text" class='form-control' value='' name="id_cliente" id="id_cliente" readonly />
						</div>
						
						<div class='col-md-2'>
							<label>RFC:</label>
							<input type="text" class='form-control' value='' name="rfc_cliente" id="rfc_cliente" readonly />
						</div>
						
						<div class='col-md-2'>
							<label for="validationDefault01">Nombre:</label>
							<input list="clientes" class='form-control' value='' name="nom_cliente" id="nom_cliente" >
							<datalist id="clientes">
								@foreach($clientes as $cli)
								<option value="{{$cli->nom_cliente}}">{{$cli->nom_cliente}} {{$cli->ap_cliente}} {{$cli->am_cliente}}</option>
								@endforeach
							</datalist>
						</div>
						
						<div class='col-2'>
							<label>AP Paterno:</label>
							<input type="text" class='form-control' value='' name="ap_cliente" id="ap_cliente" readonly />
						</div>
						
						<div class='col-2'>
							<label>AP Materno:</label>
							<input type="text" class='form-control' value='' name="am_cliente" id="am_cliente" readonly />
						</div>
						
						<div class='col-2'>
							<label></label><br>
							<input type="button" class="btn btn-outline-success" name="buscar2" value="Buscar" id="buscar2"/>
							<input type="button" class="btn btn-outline-danger" name="limpiar_cliente" value="Limpiar" id="limpiar_cliente"/>
						</div>
						
					</div>
				</div>
			<hr>
			</div>
			
<!------------------------------------------------------- Comienza apartado empleado ------------------------------------------------------------------->
			<h5>Datos Empleado</h5>
			<div class='row justify-content-md-center'>
				<div class="form-group row">
					<div class='col-md-2'>
						<label>Código empleado:</label>
						<input type="text" class='form-control' value='' name="id_empleado" id="id_empleado"/>
					</div>
					
					<div class='col-md-2'>
						<label>Nombre:</label>
						<input list="empleados" class='form-control' value='' name="nom_empleado" id="nom_empleado" >
							<datalist id="empleados">
							@foreach($empleados as $emp)
								<option value="{{$emp->nom_empleado}}">{{$emp->nom_empleado}} {{$emp->ap_empleado}} {{$emp->am_empleado}}</option>
							@endforeach
							</datalist>
					</div>
					
					<div class='col-md-2'>
						<label>AP Paterno:</label>
						<input type="text" class='form-control' value='' name="ap_empleado" id="ap_empleado" readonly required />
					</div>
					
					<div class='col-md-2'>
						<label>AP Materno:</label>
						<input type="text" class='form-control' value='' name="am_empleado" id="am_empleado" readonly required />
					</div>
					
					<div class='col-md-2'>
						<label></label><br>
						<input type="button" class="btn btn-outline-info" name="buscar1" value="Buscar" id="buscar1" />
						<input type="button" class="btn btn-outline-danger" name="limpiar_empleado" value="Limpiar" id="limpiar_empleado" />
					</div>
				</div>
			</div>
			<hr>
<!------------------------------------------------------- Comienza apartado producto ------------------------------------------------------------------->
			<h5>Producto</h5>
			<div class='justify-content-md-center'>
				<div class="row">
					<div class='col-md-2' hidden>
						<label>Id_prod:</label>
						<input type="text" class='form-control' name="id_producto" id="id_producto"  />
					</div>
					
					<div class='col-md-2'>
						<label>Cód. SAT:</label>
						<input type="text" class='form-control' name="cod" id="cod"  readonly />
					</div>
					
					<div class='col-md-6'>
						<label>Nombre:</label>
						<input list="productos" class='form-control' name="nom_producto" id="nom_producto">
						<datalist id="productos">
						@foreach($productos as $prod)
							<option value="{{$prod->nom_producto}}">{{$prod->nom_producto}}</option>
						@endforeach
						</datalist>
					</div>
					
					<div class='col-md-2'>
						<label>Código interno:</label>
						<input type="text" class='form-control' name="cod_int" id="cod_int" />
					</div>
				</div>
				
				<div class="row">
					
					<div class='col-md-4'>
						<label>Descripción:</label>
						<input type="text" class='form-control' name="desc" id="desc" readonly />
					</div>
					
					<div class='col-md-3'>
						<label>Existencias:</label>
						<input type="text" class='form-control' name="cantidad_prod" id="cantidad_prod" readonly />
					</div>
					
					<div class='col-md-2'>
						<label>Cantidad:</label>
						<input type="text" class='form-control' name="cant" id="cant" />
					</div>
					
					<div class='col-md-3'>
						<label>C/U:</label>
						<div class="input-group mb-1">
							<div class="input-group-prepend">
							<span class="input-group-text">$</span>
							</div>
							<input type="text" class='form-control' name="prec" id="prec" readonly />
							<div class="input-group-append">
							<span class="input-group-text">.00</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class='row justify-content-md-center'>
				<div class='form-goup row'>
					<div class='col-auto'>
						<input type="button" class="btn btn-outline-primary" value="Agregar" name="Agregar" id="agregar"/>
						<input type="button" class="btn btn-outline-secondary" name="buscar" value="Buscar" id="buscar"/>
					</div>
				</div>
			</div>	
		<br><br>
			
			<table class='table' align="center" border="1" id="mitabla">
			<thead class='thead-dark'>
			<tr><th scope="col">ID</th><th scope="col">Código Int</th><th scope="col">Nombre producto</th><th scope="col">Código SAT</th><th scope="col">Descripción</th>
			<th scope="col">Precio</th><th scope="col">Cantidad</th><th scope="col">Subtotal</th><th scope="col">Eliminar</th><tr>
			</thead>
			
			</table><br>
			<div align="center">
			<div class='col-md-2'>
				<b><label>Total:</label></b>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">$</span>
					</div>
					<input type="text" class='form-control' name="total" id="total" readonly />
				</div>
			</div>
			</div>
			<div class='row justify-content-md-center'>
				<div class='form-goup row'>
			<div class='col-auto'>
				<br>
			<input type="button" class="btn btn-outline-danger" value="Cancelar venta" id="cancelar"/>
			<input type="button" value="Cobrar" class="btn btn-outline-warning" name='cobrar' id="cobrar"/>
			<input type="button" class="btn btn-primary" value='Enviar' id='enviar_venta' data-toggle="modal" data-target="#modal_alta_caja" >
			</div>
			</div>
			</div>
			
			<div id='cobro' hidden>
				
				<div class='row justify-content-md-center'>
					<div class='col-md-2'>
						<b><label>Recibido:</label></b>
						<div class="input-group mb-1">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type='text' class='form-control' name='recibido_venta' id='recibido_venta'/>
						</div>
					</div>							
					
					<div class='col-md-2'>
						<b><label>Cambio:</label></b>
						<div class="input-group mb-1">
							<div class="input-group-prepend">
								<span class="input-group-text">$</span>
							</div>
							<input type='text' class='form-control' name='cambio_venta' id='cambio_venta' readonly />
						</div>
					</div>
				</div>
			</div>
		</fieldset>
	</div>
@stop
