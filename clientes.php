<?php
session_start();
include "conexion.php";

if (!isset($_SESSION['tecnico'])) {
    header("Location: login.php");
}
include("includes/header.php");
include("includes/menu.php");
?>

<div class="main-content">
    <div class="container-fluid">

        <h3>Registrar cliente</h3>

        <form action="guardar_cliente.php" method="POST">

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Empresa</label>
                <input type="text" name="empresa" class="form-control">
            </div>

            <div class="form-group">
                <label>Teléfono</label>
                <input type="text" name="telefono" class="form-control">
            </div>

            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="correo" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Guardar cliente
            </button>

            <a href="ver_cliente.php" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> Volver
            </a>

        </form>

    </div>
</div>

<?php include("includes/footer.php"); ?>