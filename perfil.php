<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

// Obtener información del usuario desde la sesión (esto dependerá de cómo guardes la información en $_SESSION)
$usuario_id = $_SESSION['usuario_id'];
$nombre_usuario = "Nombre de Usuario"; // Obtener el nombre de usuario desde la base de datos o donde sea que lo tengas almacenado

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            width: 400px;
            margin: 0 auto;
            margin-top: 50px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 20px;
            padding: 10px 20px;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
    <title>Perfil de Usuario</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2 class="card-title">Perfil de Usuario</h2>
            <p><strong>Nombre de Usuario:</strong> <?php echo $nombre_usuario; ?></p>
            <a href="index.php?logout=true" class="btn btn-danger btn-custom">Cerrar Sesión</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
