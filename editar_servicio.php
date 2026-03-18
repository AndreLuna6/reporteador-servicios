<?php
session_start();
include "conexion.php";

$id = $_GET['id'];

$sql = "SELECT * FROM servicios WHERE id_servicio='$id'";
$resultado = $conexion->query($sql);
$servicio = $resultado->fetch_assoc();

# CONSULTAR TECNICOS
$tecnicos = $conexion->query("SELECT * FROM tecnicos");
#$sql_tecnicos = "SELECT * FROM tecnicos";
#$resultado_tecnicos = $conexion->query($sql_tecnicos);

include("includes/header.php");
include("includes/menu.php");
?>

<div class="main-content">
    <div class="container-fluid">

        <h3>Editar servicio</h3>

        <form action="actualizar_servicio.php" method="POST">

            <input type="hidden" name="id_servicio" value="<?php echo $servicio['id_servicio']; ?>">

            <div class="form-group">

                <label>Técnico</label>

                <select name="id_tecnico" class="form-control">

                    <?php while ($tec = $tecnicos->fetch_assoc()) { ?>

                        <option value="<?php echo $tec['id_tecnico']; ?>" <?php if ($tec['id_tecnico'] == $servicio['id_tecnico'])
                               echo "selected"; ?>>

                            <?php echo $tec['nombre']; ?>

                        </option>

                    <?php } ?>

                </select>

            </div>
            <div class="form-group">

                <label>Fecha del servicio</label>

                <input type="datetime-local" name="fecha" class="form-control"
                    value="<?php echo date('Y-m-d', strtotime($servicio['fecha'])); ?>">

            </div>

            <div class="form-group">
                <label>Tipo servicio</label>

                <input type="text" name="tipo_servicio" class="form-control"
                    value="<?php echo $servicio['tipo_servicio']; ?>">
            </div>

            <div class="form-group">
                <label>Problema reportado</label>

                <textarea name="descripcion" class="form-control">

<?php echo $servicio['descripcion']; ?>

</textarea>

            </div>

            <div class="form-group">
                <label>Solución</label>

                <textarea name="solucion" class="form-control">

<?php echo $servicio['solucion']; ?>

</textarea>

            </div>

            <div class="form-group">

                <label>Status</label>

                <select name="estatus" class="form-control">

                    <option <?php if ($servicio['estatus'] == "Pendiente")
                        echo "selected"; ?>>Pendiente</option>
                    <option <?php if ($servicio['estatus'] == "En proceso")
                        echo "selected"; ?>>En proceso</option>
                    <option <?php if ($servicio['estatus'] == "Finalizado")
                        echo "selected"; ?>>Finalizado</option>

                </select>

            </div>

            <div class="form-group">
                <label>Comentarios</label>

                <textarea name="comentarios" class="form-control">

<?php echo $servicio['comentarios']; ?>

</textarea>

            </div>

            <button type="submit" class="btn btn-warning">
                <i class="fa fa-save"></i> Actualizar servicio
            </button>

        </form>

    </div>
</div>

<?php include("includes/footer.php");
?>