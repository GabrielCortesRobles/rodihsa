<html>
   <head>
        <script type = "text/javascript" src = "http://192.168.2.129:8080/systelecoms/assets/js/jquery-3.3.1.js"> </script> 
        <script type = "text/javascript" src = "http://192.168.2.129:8080/systelecoms/assets/js/Buscar_cliente.js"></script>
    <style>
		.fieldset
	{
		    background-color: #e9ecefba;
			height: 100%;
			width: 80%;
			margin-left: 10%;
			margin-top: 50px;
			border-radius: 7px;
	}
	</style>
   </head>
   <body>
	<fieldset class='fieldset'>
      <h1 id="p1" align="center">Modulo caja</h1>
    <div class='row justify-content-md-center'>
		<div class='col-md-2'>
			Clave: <input type="text" class='form-control' name="id_cliente" id="id_cliente" readonly />
		</div>
		<div class='col-md-2'>
			A. paterno: <input type="text" class='form-control' name="am_cliente" id="ap_cliente"  />
		</div>
		<div class='col-md-2'>
			A. materno: <input type="text" class='form-control' name="ap_cliente" id="am_cliente" />
		</div>
		<div class='col-md-2'>
			Nombre(s): <input type="text" class='form-control' name="nom_cliente" id="nom_cliente" />
		</div>
		<div class='col-auto'>
			<input type="button" class="btn btn-primary mb-2" value="Agregar" id="agregar"/>
			<input type="button" class="btn btn-primary mb-2" name='buscar' value="Buscar" id="buscar"/>
		</div>
	</div>		
	<br><br>
	  
	  <table class='table' align="center" border="1" id="mitabla">
	  <thead class='thead-dark'>
	  <tr><th scope="col">Clave</th><th scope="col">Descripcion</th><th scope="col">Precio</th><th scope="col">Cantidad</th><th scope="col">Total</th><tr>
	  </thead>
	  <tr>
	  <td>
		<div>
			<input type="text" class='form-control' name="id_producto" id="id_producto" readonly />
		</div>
	  </td>
	  <td>
		<div>
			<input type="text" class='form-control' name="nom_prod" id="nom_prod" readonly />
		</div>
	  </td>
	  <td>
		<div>
			<input type="text" class='form-control' name="precio" id="precio" readonly />
		</div>
	  </td>
	  <td>
		<div>
			<input type="text" class='form-control' name="cantidad_prod" id="cantidad_prod" readonly />
		</div>
	  </td>
	  <td>
		<div>
			<input type="text" class='form-control' name="total" id="total" readonly />
		</div>
	  </td>  
	  </tr>
	  </table><br>
	
    <div class='row justify-content-md-center'>
		<div class='col-md-2'>
			Recibido: <input type="text" class='form-control' name="recibido" id="recibido"/>
		</div>
		<div class='col-md-2'>
			Cambio: <input type="text" class='form-control' name="cambio" id="cambio" readonly />
		</div>
	</div>	
	  <input type="button" class="btn btn-danger" value="Cancelar" id="cancelar"/>
	  <input type="button" value="Aceptar" class="btn btn-primary" id="aceptar"/>
	</fieldset>
   </body>
</html>
