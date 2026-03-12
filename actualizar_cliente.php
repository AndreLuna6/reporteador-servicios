<?php

include "conexion.php";

$id = $_POST['id_cliente'];
$nombre = $_POST['nombre'];
$empresa = $_POST['empresa'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$sql = "UPDATE clientes 
        SET nombre='$nombre',
            empresa='$empresa',
            telefono='$telefono',
            correo='$correo'
        WHERE id_cliente=$id";

if($conexion->query($sql)){
    header("Location: ver_cliente.php");
}else{
    echo "Error al actualizar";
}

?>