<?php

session_start();
include "conexion.php";

if (!isset($_SESSION['id_tecnico'])) {
    header("Location: login.php");
    exit();
}

$id_tecnico = $_SESSION['id_tecnico'];

include("includes/header.php");
include("includes/menu.php");



/* CONSULTA PARA GRAFICA */

$sql = "SELECT 
COUNT(CASE WHEN estatus='Pendiente' THEN 1 END) AS pendientes,
COUNT(CASE WHEN estatus='En proceso' THEN 1 END) AS proceso,
COUNT(CASE WHEN estatus='Finalizado' THEN 1 END) AS finalizados
FROM servicios
WHERE id_tecnico='$id_tecnico'";

$result = $conexion->query($sql);
$datos = $result->fetch_assoc();

/* CONSULTA SERVICIOS RECIENTES */

$sql_servicios = "SELECT servicios.*, clientes.nombre AS cliente
FROM servicios
INNER JOIN clientes ON servicios.id_cliente = clientes.id_cliente
WHERE servicios.id_tecnico='$id_tecnico'
ORDER BY servicios.id_servicio ASC
LIMIT 15";

$servicios = $conexion->query($sql_servicios);
?>

<div class="main-content">
    <div class="container">

        <h3>Panel de servicios</h3>

        <br>

        <div style="width:300px;">

            <canvas id="graficaServicios"></canvas>

        </div>

        <h3>Mis servicios recientes</h3>

        <table class="table table-bordered table-hover" style="width:75%;">

            <tr>

                <th>ID</th>
                <th>Cliente</th>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Status</th>

            </tr>

            <?php while ($fila = $servicios->fetch_assoc()) { ?>

                <tr>

                    <td><?php echo $fila['id_servicio']; ?></td>

                    <td><?php echo $fila['cliente']; ?></td>

                    <td><?php echo $fila['tipo_servicio']; ?></td>

                    <td><?php echo date("d/m/Y", strtotime($fila['fecha'])); ?></td>

                    <td><?php echo $fila['estatus']; ?></td>

                </tr>

            <?php } ?>

        </table>

    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        var ctx = document.getElementById('graficaServicios');

        new Chart(ctx, {

            type: 'pie',

            data: {

                labels: ['Pendientes', 'En proceso', 'Finalizados'],

                datasets: [{

                    data: [
                        <?php echo $datos['pendientes']; ?>,
                        <?php echo $datos['proceso']; ?>,
                        <?php echo $datos['finalizados']; ?>
                    ],

                    backgroundColor: [
                        '#f0ad4e',
                        '#5bc0de',
                        '#5cb85c'
                    ]

                }]

            },

            options: {

                responsive: true,

                plugins: {
                    legend: {
                        position: 'right'
                    }
                }

            }

        });

    </script>

    <?php include("includes/footer.php"); ?>