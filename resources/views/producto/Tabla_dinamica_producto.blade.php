@include('header.Header')
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script type = "text/javascript" src = "js/Tabla_dinamica_productos.js"></script>
		<title>Busqueda producto</title>
	</head>
	<body>
		@include('cliente.Modal_alta_cliente')
		@include('proveedor.Modal_alta_proveedores')
		@include('producto.Modal_alta_producto')
		@include('empleado.Modal_alta_empleado')
		<div class='container'>
			<div class='col-md-4' id='form'>
				<h4><label>Buscar:</label></h4>
				<input type='text' class='form-control' name='caja_busqueda' id='caja_busqueda' placeholder='ingresa criterio de busqueda'>
			</div>
			<hr>
			<div class='col-md-12'>
				<div class="table-responsive" id='datos'>
				
				</div>
			</div>
		</div>
		
	</body>
</html>