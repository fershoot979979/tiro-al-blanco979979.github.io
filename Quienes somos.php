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
<section id="inicio">
    <center>
        <h2>Descubre Nuestros Deliciosos Pays Caseros</h2>
        <p>En Pays Brother ofrecemos una amplia variedad de pays <br>
            caseros que te harán la boca agua. Estamos ubicados en Montemorelos, <br>
            Nuevo León, y ofrecemos envíos con anticipación así como entregas para eventos especiales.</p>
        <a href="Productos.php" class="boton">Ver nuestros pays</a>
    </center>
    <br>
</section>

<!-- Sección de preparación de pays -->
<section id="preparacion">
    <center>
    <h2>Conoce Nuestro Proceso de Preparación, los invitamos a nuestra <br>
        sucursal para que conozcas de primera mano la preparación de nuestros productos.</h2>
    <div class="gallery">
        <img src="preparacion1.jpg" width="250" height="250" alt="Preparación de pay 1">
        <img src="preparacion2.jpg" width="250" height="250" alt="Preparación de pay 2">
        <img src="preparacion3.jpg" width="250" height="250" alt="Preparación de pay 3">
        <!-- Agregar más imágenes según sea necesario -->
    </div>
    <h2>¿Quiénes somos?</h2>
    <p>En Pays Brother nos enorgullece ofrecerte pays preparados con ingredientes <br>
        frescos y con un proceso de elaboración cuidadoso. Desde la selección de los <br>
        ingredientes hasta el horneado final, garantizamos la mejor calidad y sabor <br>
        en cada pieza que hacemos.</p>
    <p>Somos una empresa dedicada a llevar a tu mesa los mejores pays caseros de Montemorelos, <br>
        con un equipo comprometido con la calidad y el servicio. Nuestra pasión por la repostería <br>
        se refleja en cada pay que elaboramos, cuidando cada detalle para ofrecerte una experiencia <br>
        gastronómica única.</p>
    <br>
    <h2>¡¡¡Ven y no te pierdas de nuestros deliciosos Pays!!!</h2>

    </center>
</section>

<!-- Pie de página -->
<footer>
    <p>&copy; 2024 Pays Brother - Todos los derechos reservados.</p>
</footer>

</body>
</html>
