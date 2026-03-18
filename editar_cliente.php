<?php
include "conexion.php";

$id = $_GET['id'];

$sql = "SELECT * FROM clientes WHERE id_cliente = $id";
$resultado = $conexion->query($sql);
$cliente = $resultado->fetch_assoc();

include("includes/header.php");
include("includes/menu.php");
?>

<div class="main-content">
    <div class="container-fluid">

        <h3>Editar cliente</h3>

        <form action="actualizar_cliente.php" method="POST">

            <input type="hidden" name="id_cliente" value="<?php echo $cliente['id_cliente']; ?>">

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $cliente['nombre']; ?>">
            </div>

            <div class="form-group">
                <label>Empresa</label>
                <input type="text" name="empresa" class="form-control" value="<?php echo $cliente['empresa']; ?>">
            </div>

            <div class="form-group">
                <label>Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="<?php echo $cliente['telefono']; ?>">
            </div>

            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="correo" class="form-control" value="<?php echo $cliente['correo']; ?>">
            </div>

            <button type="submit" class="btn btn-warning">
                <i class="fa fa-save"></i> Actualizar cliente
            </button>

        </form>

    </div>
</div>

<?php include("includes/footer.php"); ?>