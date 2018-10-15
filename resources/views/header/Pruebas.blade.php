<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Material Design for Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap-material-design.css">

    <title>Hello, world!</title>
  </head>
  <body>
<form>
<ul class="nav nav-tabs" style='background-color: #E67E22;'>
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
  </li>
<li class="nav-item active">
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>Nuevo
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
							<button type="button" class="dropdown-item" data-toggle="modal" data-target="#alta_producto">
								Producto
							</button>
							<button type="button" class="dropdown-item" data-toggle="modal" data-target="#alta_empleado">
								Empleado
							</button>
							<button type="button" class="dropdown-item" data-toggle="modal" data-target="#alta_proveedor">
								Proveedores
							</button>
							<button type="button" class="dropdown-item" data-toggle="modal" data-target="#alta_cliente">
								Cliente
							</button>
						</div>
					</div>
				</li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Another link</a>
  </li>
  <li class="nav-item">
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
  </li>
</ul>

<!-- dark -->
<ul class="nav nav-tabs bg-dark">
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Another link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul>

<!-- primary -->
<ul class="nav nav-tabs bg-primary">
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Another link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrapMaterialDesign.js"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
  </body>
</html>