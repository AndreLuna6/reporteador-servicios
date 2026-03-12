<?php
session_start();
include "conexion.php";

if(!isset($_SESSION['tecnico'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Registrar cliente</title>
</head>

<body>

<h2>Registrar cliente</h2>

<form method="POST" action="guardar_cliente.php">

Nombre:
<br>
<input type="text" name="nombre" required>

<br><br>

Empresa:
<br>
<input type="text" name="empresa">

<br><br>

Teléfono:
<br>
<input type="text" name="telefono">

<br><br>

Correo:
<br>
<input type="email" name="correo">

<br><br>

<button type="submit">Guardar cliente</button>

</form>

<br><br>

<a href="index.php">Volver al dashboard</a>

</body>
</html>