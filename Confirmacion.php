<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['UsuarioID'])) {
    header("Location: Sesion.php"); // Redirigir a la página de inicio de sesión si no está logueado
    exit();
}

$usuarioID = $_SESSION['UsuarioID'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Diseño web.css">
    <title>Confirmación de Pago</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            text-align: center;
            padding: 50px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        .container h2 {
            color: #4CAF50;
        }
        .container p {
            font-size: 18px;
            color: #333;
        }
        .container a {
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pago Confirmado</h2>
        <p>Gracias por tu compra, tu pago ha sido procesado exitosamente.</p>
        <a href="Productos.php">Volver a la Tienda</a>
    </div>
</body>
</html>
