<?php
$mysqli = new mysqli('localhost', 'root', '', 'systelecoms');

$salida = "";
$query = "SELECT * FROM empleado ORDER BY nom_empleado ASC;";

if(isset($_POST['consulta']))
{
	$q = $mysqli->real_escape_string($_POST['consulta']);
	utf8_encode($q);
	$query = "SELECT * FROM empleado
WHERE nom_empleado LIKE '%".$q."%' OR ap_empleado LIKE '%".$q."%' OR am_empleado LIKE '%".$q."%' ORDER BY nom_empleado ASC;";
}

$resultado = $mysqli->query($query);

if($resultado->num_rows > 0)
{
	$salida.= "<table class='table table-bordered table table-striped'>
					<thead>
						<tr class='bg-primary'>
							<td>Nombre</td>
							<td>A. Paterno</td>
							<td>A. Materno</td>
							<td>CURP</td>
							<td>RFC</td>
							<td>Calle</td>
							<td>N. Interior</td>
							<td>N. Exterior</td>
							<td>Colonia</td>
							<td>Municipio</td>
							<td>Correo electronico</td>
							<td>Telefono</td>
						</tr>
					</thead>
					<tbody>";
					
	while($fila = $resultado->fetch_assoc())
	{
		$salida.= "<tr>
						<td>".utf8_encode($fila['nom_empleado'])."</td>
						<td>".$fila['ap_empleado']."</td>
						<td>".$fila['am_empleado']."</td>
						<td>".$fila['curp_empleado']."</td>
						<td>".$fila['rfc_empleado']."</td>
						<td>".$fila['calle']."</td>
						<td>".$fila['numero_interior']."</td>
						<td>".$fila['numero_exterior']."</td>
						<td>".$fila['colonia']."</td>
						<td>".$fila['municipio']."</td>
						<td>".$fila['correo']."</td>
						<td>".$fila['telefono']."</td>
					</tr>";
	}
	$salida.= "</tbody>
				</table>";
}
else
{
	$salida.= "No se encontro resultado :'(";
}

echo $salida;

$mysqli->close();
?>