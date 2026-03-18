<?php
include "conexion.php";

$id = $_POST['id_servicio'];
$id_tecnico = $_POST['id_tecnico'];
$fecha = $_POST['fecha'];
$tipo_servicio = $_POST['tipo_servicio'];
$descripcion = $_POST['descripcion'];
$solucion = $_POST['solucion'];
$estatus = $_POST['estatus'];
$comentarios = $_POST['comentarios'];

$sql = "UPDATE servicios SET
id_tecnico='$id_tecnico',
tipo_servicio='$tipo_servicio',
fecha='$fecha',
descripcion='$descripcion',
solucion='$solucion',
estatus='$estatus',
comentarios='$comentarios'
WHERE id_servicio='$id'";

$conexion->query($sql);

header("Location: ver_servicios.php");
?>