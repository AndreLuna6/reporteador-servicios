<?php
include "conexion.php";

$id = $_GET['id'];

$sql = "SELECT * FROM clientes WHERE id_cliente = $id";
$resultado = $conexion->query($sql);
$cliente = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
<title>Editar cliente</title>
</head>

<body>

<h2>Editar cliente</h2>

<form method="POST" action="actualizar_cliente.php">

<input type="hidden" name="id_cliente" value="<?php echo $cliente['id_cliente']; ?>">

Nombre:
<br>
<input type="text" name="nombre" value="<?php echo $cliente['nombre']; ?>">

<br><br>

Empresa:
<br>
<input type="text" name="empresa" value="<?php echo $cliente['empresa']; ?>">

<br><br>

Teléfono:
<br>
<input type="text" name="telefono" value="<?php echo $cliente['telefono']; ?>">

<br><br>

Correo:
<br>
<input type="email" name="correo" value="<?php echo $cliente['correo']; ?>">

<br><br>

<button type="submit">Actualizar</button>

</form>

</body>
</html>