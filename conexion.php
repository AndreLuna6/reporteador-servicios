<?php
$conexion = new mysqli("localhost","root","","reporte_servicios");

if($conexion->connect_error){
    die("Error de conexión");
}
?>