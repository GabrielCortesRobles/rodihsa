<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{asset('css/bootstrap-material-design.css')}}">
		<link rel="stylesheet" href="{{asset('css/Inicio.css')}}">
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('js/jquery-3.2.1.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/bootstrapMaterialDesign.js')}}"></script>
    <script src="{{asset('js/Empleado.js')}}"></script>
	<script type = "text/javascript" src = "js/jquery-3.2.1.js"> </script>
	<script type = "text/javascript" src = "js/Insertar_venta.js"></script>
	<script type = "text/javascript" src = "js/Agrega_producto.js"></script>
	<script type = "text/javascript" src = "js/Buscar_producto.js"></script>
	<script type = "text/javascript" src = "js/Buscar_precio.js"></script>
	<script type = "text/javascript" src = "js/Buscar_cliente.js"></script>
	<script type = "text/javascript" src = "js/Buscar_empleado.js"></script>
		<title>BA | Administrador</title>
		<link rel="shortcut icon" href="{{asset('Images/systelecom.ico')}}">
	</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light" style='background-color: #E67E22;'>
		<a class="navbar-brand" href="#">{{Session::get('sesionname')}}</a>
		<img src="{{asset('Images/')}}/{{$image=Session::get('img')}}" height="50px" width="50px">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			@if(Session::get('sesionprivilegio_admin')|Session::get('sesionprivilegio_almacen')|Session::get('sesionprivilegio_venta')=='1')
				<li class="nav-item active">
					<div class="dropdown">
						<button class="btn btn-darck dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>Nuevo
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
						@if(Session::get('sesionprivilegio_admin')|Session::get('sesionprivilegio_almacen')=='1')
							<button type="button" class="dropdown-item" data-toggle="modal" data-target="#alta_producto">
								Producto
							</button>
							<button type="button" class="dropdown-item" data-toggle="modal" data-target="#alta_empleado">
								Empleado
							</button>
							<button type="button" class="dropdown-item" data-toggle="modal" data-target="#alta_proveedor">
								Proveedor
							</button>
							@endif
							@if(Session::get('sesionprivilegio_admin')|Session::get('sesionprivilegio_almacen')|Session::get('sesionprivilegio_venta')=='1')
							<button type="button" class="dropdown-item" data-toggle="modal" data-target="#alta_cliente">
								Cliente
							</button>
							@endif
							@if(Session::get('sesionprivilegio_admin')|Session::get('sesionprivilegio_almacen')=='1')
							<button type="button" class="dropdown-item" data-toggle="modal" data-target="#alta_entrada">
								Entrada
							<button type="button" class="dropdown-item" data-toggle="modal" data-target="#alta_departamento">
								Departamento
							</button>
							@endif
						</div>
					</div>
				</li>
				@endif
	  
				<li class="nav-item">
				@if(Session::get('sesionprivilegio_admin')|Session::get('sesionprivilegio_venta')|Session::get('sesionprivilegio_almacen')=='1')
					<div class="dropdown">
						<button class="btn btn-darck dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="glyphicon glyphicon-align-left" aria-hidden="true">Busqueda</span>
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
							<!-- Boton que direcciona a la vista de la busqueda de productos -->
							<form class="form-inline my-2 my-lg-0" action="{{route('reporteproducto')}}">
									<button class="dropdown-item" type="submit">Lista de Productos</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action="{{route('reportecliente')}}">
									<button class="dropdown-item" type="submit">Lista de Clientes</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action="{{route('reporteempleado')}}">
									<button class="dropdown-item" type="submit">Lista de Empleados</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action="{{route('reporteproveedor')}}">
									<button class="dropdown-item" type="submit">Lista de Proveedor</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action="{{route('reporteentrada')}}">
									<button class="dropdown-item" type="submit">Lista de Almacen</button>
							</form>
							<form class="form-inline my-2 my-lg-0" action="{{route('reportedepartamento')}}">
									<button class="dropdown-item" type="submit">Lista Departamentos</button>
							</form>
						</div>
						</div>
					@endif
				</li>
				@if(Session::get('sesionprivilegio_admin')|Session::get('sesionprivilegio_venta')=='1')
				<li class="nav-item">
					
					<!-- Boton que direcciona al modulo de ventas -->
					<form class="form-inline my-2 my-lg-0" action="{{route('modulo_venta')}}">
							<button class="btn btn-darck" type="submit">Módulo venta</button>
					</form>
				
				</li>
				@endif
				
				<!--<li class="nav-item">
					
					<form class="form-inline my-2 my-lg-0" action="{{route('modulofactura')}}" method='get'>
							<button class="btn btn-darck" type="submit">Módulo Factura</button>
					</form>
				</li>-->
				
			</ul>
		</div>
		<!-- Boton desplegable de Busqueda -->
		<div class="dropdown">
			<button class="btn btn-darck dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="glyphicon glyphicon-align-left" aria-hidden="true">Configuración</span>
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
			
				<div class="dropdown-divider"></div>
				<h6 class="dropdown-header" align='center'>Reportes</h6>
				<div>
				<!-- Busqueda -->
					<form class="form-inline my-2 my-lg-0" action='http://192.168.2.129:8080/systelecoms/index.php/producto/Controller_producto/buscar_producto' method='POST'>
						<input class="dropdown-item" type="search" name='criterio' placeholder="Producto" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" hidden>Buscar</button>
					</form>
				</div>
	
				<div>
				<!-- Busqueda -->
					<form class="form-inline my-2 my-lg-0" action='http://192.168.2.129:8080/systelecoms/index.php/empleado/Controller_empleado/buscar_empleado' method='POST'>
						<input class="dropdown-item" type="search" name='criterio' placeholder="Empleado" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" hidden>Buscar</button>
					</form>
				</div>
	
				<div>
				<!-- Busqueda -->
					<form class="form-inline my-2 my-lg-0" action='http://192.168.2.129:8080/systelecoms/index.php/proveedor/Controller_proveedor/buscar_proveedor' method='POST'>
						<input class="dropdown-item" type="search" name='criterio' placeholder="Proveedor" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" hidden>Buscar</button>
					</form>
				</div>
	
				<div>
				<!-- Busqueda -->
					<form class="form-inline my-2 my-lg-0" action='http://192.168.2.129:8080/systelecoms/index.php/cliente/Controller_cliente/buscar_cliente' method='POST'>
						<input class="dropdown-item" type="search" name='criterio' placeholder="Cliente" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" hidden>Buscar</button>
					</form>
				</div>
				
				<div>
				<!-- Busqueda -->
					<form class="form-inline my-2 my-lg-0" action='http://192.168.2.129:8080/systelecoms/index.php/tiket/Controller_tiket/buscar_tiket' method='POST'>
						<input class="dropdown-item" type="search" name='criterio' placeholder="Tiket" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" hidden>Buscar</button>
					</form>
				</div>
				@if(Session::get('sesionprivilegio_admin')=='1')
				<div class="dropdown-divider"></div>
			
					<div>
						<button class="dropdown-item" type="submit" data-toggle="modal" data-target="#empresa">Empresa</button>
					</div>
				@endif
				<div>
				
				<!-- restauracion de la base de datos -->
					<form class="form-inline my-2 my-lg-0" action="http://192.168.2.129:8080/systelecoms/mysql/index.php">
						<button class="dropdown-item" type="submit">Restore</button>
					</form>
				</div>
				<div>
				<!-- respaldo de la base de datos -->
					<form class="form-inline my-2 my-lg-0" action="http://192.168.2.129:8080/systelecoms/mysql/Backup.php">
						<button class="dropdown-item" type="submit">Backup</button>
					</form>
				</div>
				<div class="dropdown-divider"></div>
				<div>
				<!-- Cerrar session -->
					<form class="form-inline my-2 my-lg-0" action="{{route('/')}}">
						<button class="dropdown-item" type="submit">Cerrar sesión</button>
					</form>
				</div>
			</div>
		</div>
	</nav>
	<div>
	@include('empresa.Modal_empresa')
	@include('cliente.Modal_alta_cliente')
	@include('proveedor.Modal_alta_proveedores')
	@include('producto.Modal_alta_producto')
	@include('empleado.Modal_alta_empleado')
	@include('entrada.Modal_alta_entrada')
	@include('departamento.Modal_alta_departamento')
	</div>
	@yield('contenido')
</body>
</html>