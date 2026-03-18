<?php

session_start();
include "conexion.php";

$id_cliente = $_POST['id_cliente'];
$id_tecnico = $_POST['id_tecnico'];
$fecha = $_POST['fecha'];
$tipo_servicio = $_POST['tipo_servicio'];
$descripcion = $_POST['descripcion'];
$solucion = $_POST['solucion'];
$solicitante = $_POST['solicitante'];
$responsable = $_POST['responsable'];
$estatus = $_POST['estatus'];
$comentarios = $_POST['comentarios'];

$sql = "INSERT INTO servicios
(id_cliente,id_tecnico, fecha, tipo_servicio,descripcion, solucion,solicitante,responsable,estatus,comentarios)
VALUES
('$id_cliente','$id_tecnico','$fecha','$tipo_servicio','$descripcion','$solucion','$solicitante','$responsable','$estatus','$comentarios')";

if($conexion->query($sql)){
    header("Location: ver_servicios.php");

} else {

    echo "Error al registrar servicio";

}

?>