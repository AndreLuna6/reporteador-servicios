<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<nav class="navbar navbar-inverse" style="border-radius:0; background:#04ae9e; border:none; margin-bottom:0;">

    <div class="container-fluid">

        <div class="navbar-header">
            <a class="navbar-brand" style="color:white;">
                Sistema de Servicios
            </a>
        </div>

        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">

                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:white;">
                    <i class="fa fa-user"></i>
                    <?php echo $_SESSION['tecnico']; ?>
                </a>

                <ul class="dropdown-menu">

                    <li>
                        <a href="logout.php">
                            <i class="fa fa-sign-out"></i> Cerrar sesión
                        </a>
                    </li>

                </ul>

            </li>

        </ul>

    </div>

</nav>