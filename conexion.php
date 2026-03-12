<?php

$conexion = new mysqli("localhost","root","masterkey","reporte_servicios");

if($conexion->connect_error){
    die("Error de conexión: " . $conexion->connect_error);
}

//echo "Conectado correctamente";

?>