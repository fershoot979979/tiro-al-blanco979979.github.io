<?php
session_start();

// Verificar si se ha solicitado cerrar sesión
if (isset($_GET['logout'])) {
    session_destroy(); // Destruir todas las variables de sesión
    header("Location: Sesion.php"); // Redirigir a la página de inicio de sesión
    exit();
}

// Verificar si el usuario está logueado
if (!isset($_SESSION['UsuarioID'])) {
    header("Location: Sesion.php"); // Redirigir a la página de inicio de sesión si no está logueado
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos1.css">
    <script src="Interaccion.js"></script>
    <title>Pays Brother</title>
</head>
<body>
    <script src="Interaccion.js"></script>
    <header>
        <div class="container">
            <div class="logo"> 
                <img src="logoPag.png" align="left" alt="Logo">
            </div>
            <div class="logo1"> 
                <img src="logoPag.png" align="right" alt="logo1">
            </div>
            <h1>Bienvenido a Tu Tienda online de Pays, los mejores de Montemorelos.</h1>
            <nav>
                <ul>
                    <li class="nav-item active">
                        <a class="nav-link" href="Pagina.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Productos.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Quienes somos.php">Quienes somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Ubicacion.php">Ubicación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="politica.php">Política de privacidad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Contacto.php">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Carrito.php">Carrito</a>
                    </li>
                    <li><a href="?logout" class="btn btn-outline-light ml-3">Cerrar Sesión</a></li> <!-- Botón de cerrar sesión -->
                </ul>
            </nav>
        </div>
    </header>
    
        <!-- Sección de inicio -->
        <center>
            <h2>Descubre Nuestros Deliciosos sabores de Pays</h2>
            <p>Ofrecemos una amplia variedad de pays caseros que <br>
                te harán la boca agua, los tenemos en Montemorelos, <br>
                Nuevo León, contamos con envíos con anticipación y entregas <br>
                para eventos especiales.</p>
            <a href="Productos.php" class="boton">Ver nuestros pays</a>
        </center>
        <br>
        <!-- Sección de productos -->
        <!-- Sección de productos -->
    <!-- Sección de productos -->
    <!-- Sección de inicio -->
    <!-- Sección de ubicación -->
<section id="ubicacion">
    <center>
    <h2>Encuéntranos</h2>
    <div class="gallery">
        <img src="Dondeestara2.jpg.png" alt="Preparación de pay 1">
        <img src="Dondeestara.jpg.png" alt="Preparación de pay 1">
        <!-- Agrega más imágenes según sea necesario -->
    </div>
    <!-- Puedes agregar un mapa interactivo de Google Maps aquí -->
    <p>Estamos ubicados en: Fraccionamiento Hacienda Las Cumbres</p>
    <p>Dirección: Montemorelos Calle Popocatepetl en Montemorelos, Nuevo León.</p>
    <p>Teléfono: 7713514112</p>
    <p>Horario: Lunes a Viernes de 8:00 am a 8:30 pm</p>
</section>

    
    
</body>
</html>
