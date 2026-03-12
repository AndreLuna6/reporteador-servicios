<?php
session_start();
include "conexion.php";

if (!isset($_SESSION['tecnico'])) {
    header("Location: login.php");
    exit();
}

$resultado = null;

if (isset($_GET['buscar'])) {

    $buscar = $_GET['buscar'];

    $sql = "SELECT * FROM clientes 
        WHERE nombre LIKE '%$buscar%' 
        OR empresa LIKE '%$buscar%'";

    $resultado = $conexion->query($sql);

}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Clientes registrados</title>
</head>

<body>

    <h2>Lista de clientes</h2>

    <form method="GET" action="ver_cliente.php">

        Buscar cliente:
        <input type="text" name="buscar">

        <button type="submit">Buscar</button>

    </form>

    <br>

    <?php
    if ($resultado) {
        ?>

        <table border="1">

            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Empresa</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Status</th>
                <th>Acciones</th>
            </tr>

            <?php while ($fila = $resultado->fetch_assoc()) { ?>

                <tr>

                    <td><?php echo $fila['id_cliente']; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['empresa']; ?></td>
                    <td><?php echo $fila['telefono']; ?></td>
                    <td><?php echo $fila['correo']; ?></td>
                    <td><?php echo $fila['estatus']; ?></td>

                    <td>

                        <a href="editar_cliente.php?id=<?php echo $fila['id_cliente']; ?>">Editar</a>

                        |

                        <?php
                        if ($fila['estatus'] == 'activo') {
                            ?>

                            <a href="desactivar_cliente.php?id=<?php echo $fila['id_cliente']; ?>">
                                Desactivar
                            </a>

                            <?php
                        } else {
                            ?>

                            <a href="activar_cliente.php?id=<?php echo $fila['id_cliente']; ?>">
                                Activar
                            </a>

                            <?php
                        }
                        ?>

                    </td>

                </tr>

            <?php } ?>

        </table>

        <?php
    }
    ?>

    <br>

    <a href="clientes.php">Registrar nuevo cliente</a>
    <br><br>
    <a href="index.php">Regresar a la pagina principal</a>

</body>

</html>