<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// Conexión a la base de datos
$mysqli = new mysqli("localhost", "root", "", "pays");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

// Obtener información del usuario
$usuario_id = $_SESSION['usuario_id'];
$sql = "SELECT * FROM usuarios WHERE id='$usuario_id'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
} else {
    echo "Error al obtener la información del usuario.";
    exit();
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="estilos1.css">
    <title>Pays Brother</title>
</head>
<body>
    <center>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="logoPag.png" height="50" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="Pays-Negocios.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Productos.php">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="QuienesSomos.php">Quienes somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Ubicacion.php">Ubicación</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Politica.php">Política de Privacidad</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Contacto.php">Contacto</a>
                        </li>
                    </ul>
                    <div class="ml-3">
                        <a href="perfil.php" class="btn btn-outline-light">Ver Perfil</a>
                        <a href="logout.php" class="btn btn-outline-light ml-2">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    </center>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
