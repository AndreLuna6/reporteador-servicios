<?php

include "conexion.php";

$nombre = $_POST['nombre'];
$empresa = $_POST['empresa'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$sql = "INSERT INTO clientes (nombre, empresa, telefono, correo)
        VALUES ('$nombre','$empresa','$telefono','$correo')";

if($conexion->query($sql)){
    header("Location: clientes.php");
}else{
    echo "Error al registrar";
}

//if($conexion->query($sql)){
  //  echo "Cliente registrado correctamente";
//}else{
  //  echo "Error al registrar";
//}

?>