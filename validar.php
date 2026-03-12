<?php
session_start();
include "conexion.php";

if(isset($_POST['usuario']) && isset($_POST['password'])){

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tecnicos 
            WHERE usuario='$usuario' 
            AND password='$password'";

    $resultado = $conexion->query($sql);

    if($resultado->num_rows > 0){

        $datos = $resultado->fetch_assoc();

        $_SESSION['tecnico'] = $datos['nombre'];
        $_SESSION['id_tecnico'] = $datos['id_tecnico'];

        header("Location: index.php");
        exit();

    }else{

        echo "Usuario o contraseña incorrectos";

    }

}else{

    header("Location: login.php");
    exit();

}
?>