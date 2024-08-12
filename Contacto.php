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

// Procesar el formulario de quejas y recomendaciones
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $to = 'contacto@paysbrother.com';
    $subject = 'Queja o Recomendación';
    $message = "Nombre: $nombre\nEmail: $email\nMensaje: $mensaje";
    $headers = 'From: ' . $email;

    mail($to, $subject, $message, $headers);

    echo "<script>alert('Tu mensaje ha sido enviado.');</script>";
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
        <p>Ofrecemos una amplia variedad de pays caseros que te harán la boca agua, los tenemos en Montemorelos, Nuevo Leon, contamos con envíos con anticipación y entregas para eventos especiales.</p>
        <a href="#productos" class="boton">Ver nuestros pays</a>
    </center>
    <br>
    <!-- Sección de productos -->
    <section id="inicio">
        <h2>Descubre cómo preparamos nuestros deliciosos pays</h2>
        <div class="gallery">
            <img src="preparacion1.jpg" width="250" height="250" alt="Preparación de pay 1">
            <img src="preparacion2.jpg" width="250" height="250"  alt="Preparación de pay 2">
            <img src="preparacion3.jpg" width="250" height="250" alt="Preparación de pay 3">
            <!-- Agrega más imágenes según sea necesario -->
        </div>
        <p>¡Te invitamos a conocer el proceso de preparación de nuestros pays! Desde la selección de los ingredientes frescos hasta el horneado final, cada paso es cuidadosamente realizado para ofrecerte la mejor calidad y sabor.</p>
        <a href="#productos" class="boton">Ver nuestros pays</a>
    </section>
    
    <!-- Sección de contacto -->
    <section id="contacto">
        <h2>Contacto</h2>
        <p>Si tienes alguna pregunta o necesitas más información, no dudes en contactarnos a través de los siguientes medios:</p>
        <ul>
            <li>Únete a nuestro grupo de WhatsApp: <a href="https://chat.whatsapp.com/Lnm0M60pjXzIncsg5Qbqhs" target="_blank">Grupo de WhatsApp</a></li>
        </ul>

        <!-- Formulario de quejas y recomendaciones -->
        <h2>Quejas y Recomendaciones</h2>
        <form action="https://formsubmit.co/contactopaysbrother@gmail.com" method="POST"/>
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" required><br><br>
            <label for="email">Correo electrónico:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <label for="mensaje">Mensaje:</label><br>
            <textarea id="mensaje" name="mensaje" rows="4" required></textarea><br><br>
            <input type="submit" value="Enviar">
        </form>
    </section>
</body>
</html>
