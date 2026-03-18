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
include("includes/header.php");
include("includes/menu.php");
?>

<div class="main-content">

    <div class="container-fluid">

        <h3>Clientes registrados</h3>

        <br>

        <form method="GET" action="ver_cliente.php" class="form-inline">

            <div class="form-group">

                <input type="text" name="buscar" class="form-control" placeholder="Buscar cliente o empresa"
                    value="<?php echo $buscar; ?>">

            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fa fa-search"></i> Buscar
            </button>

            <a href="ver_cliente.php" class="btn btn-default">
                <i class="fa fa-refresh"></i> Mostrar todos
            </a>

        </form>

        <br><br>

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Empresa</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Status</th>
                        <th>Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    <?php while ($fila = $resultado->fetch_assoc()) { ?>

                        <tr>

                            <td><?php echo $fila['id_cliente']; ?></td>
                            <td><?php echo $fila['nombre']; ?></td>
                            <td><?php echo $fila['empresa']; ?></td>
                            <td><?php echo $fila['telefono']; ?></td>
                            <td><?php echo $fila['correo']; ?></td>
                            <td>

                                <?php if ($fila['estatus'] == "activo") { ?>

                                    <span class="label label-success">Activo</span>

                                <?php } else { ?>

                                    <span class="label label-danger">Inactivo</span>

                                <?php } ?>

                            </td>

                            <td>

                                <a href="editar_cliente.php?id=<?php echo $fila['id_cliente']; ?>"
                                    class="btn btn-warning btn-sm">

                                    <i class="fa fa-edit"></i>

                                </a>

                                <?php if ($fila['estatus'] == "activo") { ?>

                                    <a href="desactivar_cliente.php?id=<?php echo $fila['id_cliente']; ?>"
                                        class="btn btn-danger btn-sm">

                                        <i class="fa fa-times"></i>

                                    </a>

                                <?php } else { ?>

                                    <a href="activar_cliente.php?id=<?php echo $fila['id_cliente']; ?>"
                                        class="btn btn-success btn-sm">

                                        <i class="fa fa-check"></i>

                                    </a>

                                <?php } ?>

                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

        <br>

        <a href="clientes.php" class="btn btn-primary">
            <i class="fa fa-user-plus"></i> Registrar nuevo cliente
        </a>

    </div>

</div>

<?php include("includes/footer.php"); ?>