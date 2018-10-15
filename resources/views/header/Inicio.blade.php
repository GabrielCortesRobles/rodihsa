@include('header.Header')
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/Inicio.css">
		<title>Business Administrator</title>
		<link rel="shortcut icon" href="Images/systelecom.ico">
	</head>
<body>
	@include('cliente.Modal_alta_cliente')
	@include('proveedor.Modal_alta_proveedores')
	@include('producto.Modal_alta_producto')
	@include('empleado.Modal_alta_empleado')
	<div id='body'>
		<div id='texto' align='center'>
			<span><h3>Bienvenido <b></b></h3></span>
			<br>
			<span><h1><b>¿Que desea hacer?</b></h1></span>
		</div>
	</div>
</body>
</html>