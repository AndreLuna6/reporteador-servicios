<?php

include "conexion.php";

$id = $_GET['id'];

$sql = "UPDATE clientes 
        SET estatus='inactivo' 
        WHERE id_cliente=$id";

if($conexion->query($sql)){
    header("Location: ver_cliente.php");
}else{
    echo "Error al actualizar estatus";
}

?>