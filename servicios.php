<?php
session_start();
include "conexion.php";

if (!isset($_SESSION['tecnico'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM clientes WHERE estatus='activo'";
$clientes = $conexion->query($sql);


#$sql_tecnicos = "SELECT * FROM tecnicos";
#$resultado_tecnicos = $conexion->query($sql_tecnicos);

include("includes/header.php");
include("includes/menu.php");
?>

<div class="main-content">
    <div class="container-fluid">

        <h3>Registrar servicio</h3>

        <form action="guardar_servicio.php" method="POST">

            <div class="form-group">

                <label>Cliente</label>

                <select name="id_cliente" class="form-control" required>

                    <?php while ($fila = $clientes->fetch_assoc()) { ?>

                        <option value="<?php echo $fila['id_cliente']; ?>">

                            <?php echo $fila['nombre']; ?> - <?php echo $fila['empresa']; ?>

                        </option>

                    <?php } ?>

                </select>

            </div>


            <div class="form-group">

                <label>Técnico encargado</label>

                <select name="id_tecnico" class="form-control" required>

                    <?php
                    $sql = "SELECT * FROM tecnicos";
                    $resultado = $conexion->query($sql);

                    while ($tec = $resultado->fetch_assoc()) {
                        ?>

                        <option value="<?php echo $tec['id_tecnico']; ?>">

                            <?php echo $tec['nombre']; ?>

                        </option>

                    <?php } ?>

                </select>

            </div>


            <div class="form-group">

                <label>Fecha del servicio</label>

                <input type="date" name="fecha" class="form-control" required>

            </div>


            <div class="form-group">

                <label>Tipo de servicio</label>

                <input type="text" name="tipo_servicio" class="form-control" required>

            </div>


            <div class="form-group">

                <label>Descripción del problema</label>

                <textarea name="descripcion" class="form-control"></textarea>

            </div>


            <div class="form-group">

                <label>Solución aplicada</label>

                <textarea name="solucion" class="form-control"></textarea>

            </div>


            <div class="form-group">

                <label>Solicitante</label>

                <input type="text" name="solicitante" class="form-control">

            </div>


            <div class="form-group">

                <label>Responsable</label>

                <input type="text" name="responsable" class="form-control">

            </div>


            <div class="form-group">

                <label>Status</label>

                <select name="estatus" class="form-control">

                    <option>Pendiente</option>
                    <option>En proceso</option>
                    <option>Finalizado</option>

                </select>

            </div>


            <div class="form-group">

                <label>Comentarios</label>

                <textarea name="comentarios" class="form-control"></textarea>

            </div>

            <br>

            <button type="submit" class="btn btn-success">

                <i class="fa fa-save"></i> Guardar servicio

            </button>

            <a href="index.php" class="btn btn-default">

                <i class="fa fa-arrow-left"></i> Regresar

            </a>

        </form>

    </div>
</div>

<?php include("includes/footer.php"); ?>