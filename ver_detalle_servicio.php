<?php
session_start();
include "conexion.php";

if (!isset($_SESSION['tecnico'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT servicios.*, clientes.nombre AS cliente, clientes.empresa,
tecnicos.nombre AS tecnico
FROM servicios
INNER JOIN clientes ON servicios.id_cliente = clientes.id_cliente
INNER JOIN tecnicos ON servicios.id_tecnico = tecnicos.id_tecnico
WHERE servicios.id_servicio = '$id'";

$resultado = $conexion->query($sql);
$servicio = $resultado->fetch_assoc();

include("includes/header.php");
include("includes/menu.php");
?>

<div class="main-content">
<div class="container-fluid">

<h3>Detalle del servicio</h3>

<table class="table table-bordered">

<tr>
<th>ID</th>
<td><?php echo $servicio['id_servicio']; ?></td>
</tr>

<tr>
<th>Cliente</th>
<td><?php echo $servicio['cliente']; ?></td>
</tr>

<tr>
<th>Empresa</th>
<td><?php echo $servicio['empresa']; ?></td>
</tr>

<tr>
<th>Técnico</th>
<td><?php echo $servicio['tecnico']; ?></td>
</tr>

<tr>
<th>Tipo de servicio</th>
<td><?php echo $servicio['tipo_servicio']; ?></td>
</tr>

<tr>
<th>Fecha</th>
<td><?php echo date("d/m/Y", strtotime($servicio['fecha'])); ?></td>
</tr>

<tr>
<th>Status</th>
<td><?php echo $servicio['estatus']; ?></td>
</tr>

<tr>
<th>Problema reportado</th>
<td><?php echo $servicio['descripcion']; ?></td>
</tr>

<tr>
<th>Solución</th>
<td><?php echo $servicio['solucion']; ?></td>
</tr>

<tr>
<th>Comentarios</th>
<td><?php echo $servicio['comentarios']; ?></td>
</tr>

</table>

<a href="generar_pdf.php?id=<?php echo $servicio['id_servicio']; ?>"
class="btn btn-success">

<i class="fa fa-file-pdf-o"></i> Generar PDF

</a>

<a href="ver_servicios.php"
class="btn btn-default">

<i class="fa fa-arrow-left"></i> Regresar

</a>

</div>
</div>

<?php include("includes/footer.php"); ?>