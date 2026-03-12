<?php
session_start();

if(!isset($_SESSION['tecnico'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Sistema de servicios</title>
</head>

<body>

<h2>Sistema de reportes de servicio</h2>

Bienvenido: <?php echo $_SESSION['tecnico']; ?>

<br><br>

<a href="clientes.php">Registrar cliente</a>
<br><br>
<a href="ver_cliente.php">ver clientes</a>
<br><br>

<a href="servicios.php">Registrar servicio</a>
<br><br>

<a href="reportes.php">Ver servicios</a>
<br><br>

<a href="logout.php">Cerrar sesión</a>

</body>
</html>