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
    </center>
    
    <main>
        <center>
        <section id="politica-privacidad" class="politica-privacidad">
            <div class="container">
                <h2 class="text-center">Política de Privacidad</h2>
                <p>En Pays Brother, valoramos tu privacidad y estamos comprometidos a proteger tu información personal. Esta Política de Privacidad describe cómo recopilamos, usamos y protegemos tus datos.</p>

                <h3>Recopilación de Información</h3>
                <p>Recopilamos información que nos proporcionas directamente, como cuando te registras en nuestro sitio, realizas una compra, te suscribes a nuestro boletín, o te pones en contacto con nosotros. Esta información puede incluir tu nombre, dirección de correo electrónico, número de teléfono y detalles de pago.</p>

                <h3>Uso de la Información</h3>
                <p>Usamos la información que recopilamos para:</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Procesar tus pedidos y transacciones.</li>
                    <li class="list-group-item">Mejorar nuestro sitio web y servicios.</li>
                    <li class="list-group-item">Enviarte actualizaciones y promociones.</li>
                    <li class="list-group-item">Responder a tus preguntas y comentarios.</li>
                </ul>

                <h3>Protección de la Información</h3>
                <p>Implementamos diversas medidas de seguridad para proteger tus datos personales, tanto en línea como fuera de línea. Solo el personal autorizado tiene acceso a la información personal, y estos están obligados a mantener la confidencialidad de dicha información.</p>

                <h3>Compartir Información</h3>
                <p>No vendemos, intercambiamos ni transferimos a terceros tu información personal sin tu consentimiento, excepto en los casos necesarios para proporcionar los servicios solicitados, cumplir con la ley o proteger nuestros derechos.</p>

                <h3>Tus Derechos</h3>
                <p>Tienes derecho a acceder, rectificar y eliminar tus datos personales. Si deseas ejercer estos derechos, por favor contáctanos a través de la información proporcionada en nuestra página de contacto.</p>

                <h3>Cambios en la Política de Privacidad</h3>
                <p>Nos reservamos el derecho de modificar esta Política de Privacidad en cualquier momento. Cualquier cambio será publicado en esta página y te notificaremos a través del correo electrónico o mediante un aviso en nuestro sitio web.</p>

                <p class="text-center">Si tienes alguna pregunta sobre nuestra Política de Privacidad, no dudes en <a href="Contacto.php">contactarnos</a>.</p>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p class="text-center">&copy; 2023 Tu mejor opción para comprar tus Pays en Pays Brother!!!</p>
        </div>
    </footer>


    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
