<?php
session_start();
include "conexion.php";
?>

<!DOCTYPE html>
<html>

<head>

    <title>Login</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #04ae9e, #2c3e50);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        .login-box {

            width: 380px;
            background: white;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);

        }

        .login-box h3 {

            text-align: center;
            margin-bottom: 25px;
            color: #333;
            font-weight: bold;

        }

        .form-control {

            border-radius: 6px;
            height: 40px;
            box-shadow: none;
            border: 1px solid #ddd;

        }

        .form-control:focus {

            border-color: #04ae9e;
            box-shadow: 0 0 5px rgba(4, 174, 158, 0.5);

        }

        .btn-login {

            width: 100%;
            background: #04ae9e;
            border: none;
            padding: 10px;
            border-radius: 6px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s;

        }

        .btn-login:hover {

            background: #039b8c;

        }

        .logo-login {

            text-align: center;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #04ae9e;

        }
    </style>

</head>

<body>

    <div class="login-box">

        <div class="logo-login">
            Sistema de Servicios
        </div>

        <form action="validar.php" method="POST">

            <div class="form-group">
                <label>Usuario</label>
                <input type="text" name="usuario" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <br>

            <button type="submit" class="btn-login">
                Ingresar
            </button>

        </form>
</body>

</html>