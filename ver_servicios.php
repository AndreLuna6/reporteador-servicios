<?php
session_start();
include "conexion.php";

if (!isset($_SESSION['tecnico'])) {
    header("Location: login.php");
    exit();
}

$buscar = "";

if (isset($_GET['buscar'])) {
    $buscar = $_GET['buscar'];
}

if ($buscar != "") {

    $sql = "SELECT servicios.*, clientes.nombre AS cliente, tecnicos.nombre AS tecnico
FROM servicios
INNER JOIN clientes ON servicios.id_cliente = clientes.id_cliente
INNER JOIN tecnicos ON servicios.id_tecnico = tecnicos.id_tecnico
WHERE clientes.nombre LIKE '%$buscar%'
OR servicios.tipo_servicio LIKE '%$buscar%'
OR servicios.estatus LIKE '%$buscar%'
ORDER BY servicios.id_servicio DESC";

} else {

    $sql = "SELECT servicios.*, clientes.nombre AS cliente, tecnicos.nombre AS tecnico
FROM servicios
INNER JOIN clientes ON servicios.id_cliente = clientes.id_cliente
INNER JOIN tecnicos ON servicios.id_tecnico = tecnicos.id_tecnico
ORDER BY servicios.id_servicio ASC";

}

$resultado = $conexion->query($sql);

include("includes/header.php");
include("includes/menu.php");
?>

<div class="main-content">
    <div class="container-fluid">

        <h3>Historial de servicios</h3>

        <form method="GET" action="ver_servicios.php" class="form-inline">

            <input type="text" name="buscar" class="form-control" placeholder="Buscar cliente o servicio">

            <button type="submit" class="btn btn-primary">
                <i class="fa fa-search"></i> Buscar
            </button>

        </form>

        <br>

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Técnico</th>
                        <th>Tipo</th>
                        <th>Fecha</th>
                        <th>Status</th>
                        <th>Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    <?php while ($fila = $resultado->fetch_assoc()) { ?>

                        <tr>

                            <td><?php echo $fila['id_servicio']; ?></td>
                            <td><?php echo $fila['cliente']; ?></td>
                            <td><?php echo $fila['tecnico']; ?></td>
                            <td><?php echo $fila['tipo_servicio']; ?></td>

                            <td>
                                <?php echo date("d/m/Y", strtotime($fila['fecha'])); ?>
                            </td>

                            <td>

                                <?php if ($fila['estatus'] == "Pendiente") { ?>

                                    <span class="label label-warning">Pendiente</span>

                                <?php } elseif ($fila['estatus'] == "En proceso") { ?>

                                    <span class="label label-info">En proceso</span>

                                <?php } else { ?>

                                    <span class="label label-success">Finalizado</span>

                                <?php } ?>

                            </td>

                            <td>

                                <a href="ver_detalle_servicio.php?id=<?php echo $fila['id_servicio']; ?>"
                                    class="btn btn-info btn-sm">

                                    <i class="fa fa-eye"></i>

                                </a>

                                <a href="editar_servicio.php?id=<?php echo $fila['id_servicio']; ?>"
                                    class="btn btn-warning btn-sm">

                                    <i class="fa fa-edit"></i>

                                </a>

                                <a href="generar_pdf.php?id=<?php echo $fila['id_servicio']; ?>"
                                    class="btn btn-success btn-sm">

                                    <i class="fa fa-file-pdf-o"></i>

                                </a>

                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>
</div>

<?php include("includes/footer.php"); ?>