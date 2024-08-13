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

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pays";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener productos de la base de datos
$sql = "SELECT nombre, precio, descripcion, imagen FROM producto";
$result = $conn->query($sql);

$productos = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}

$conn->close();
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos1.css">
    <title>Pays Brother - Productos</title>
</head>
<body>
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
                    <li><a href="?logout" class="btn btn-outline-light ml-3">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <center>
        <h2>Descubre Nuestros Deliciosos sabores de Pays</h2>
        <p>Ofrecemos una amplia variedad de pays caseros que te harán <br>
            la boca agua, los tenemos en Montemorelos, Nuevo Leon, contamos <br>
            con envíos con anticipación y entregas para eventos especiales.</p>
        <a href="Pays-Negocios.php" class="boton">Más información aquí</a>
    </center>
    <br>

    <section id="productos">
    <h2>Nuestros Productos</h2>
    <div class="grid-container">
        <?php foreach ($productos as $producto): ?>
            <div class="producto">
                <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
                <h3><?php echo htmlspecialchars($producto['nombre']); ?></h3>
                <p><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                <p class="precio">$<?php echo number_format($producto['precio'], 2); ?> pesos</p>
                <a href="Carrito.php?add=<?php echo urlencode($producto['nombre']); ?>&price=<?php echo number_format($producto['precio'], 2); ?>" class="añadir-carrito">Añadir al carrito</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

    <center>
        <section id="servicios">
            <h2>Nuestros Servicios</h2>
            <div class="servicio">
                <h3>Encargos Personalizados</h3>
                <p>Ofrecemos la opción de hacer pedidos personalizados para cualquier <br>
                    ocasión especial. Contáctanos para más información.</p>
            </div>
            <div class="servicio">
                <h3>Entregas a Domicilio</h3>
                <p>Realizamos entregas a domicilio en Montemorelos y sus alrededores. <br>
                     tu pedido con anticipación para asegurar la disponibilidad.</p>
            </div>
            <div class="servicio">
                <h3>Catering para Eventos</h3>
                <p>Ofrecemos servicios de catering para eventos especiales como bodas, <br>
                    cumpleaños y reuniones corporativas. Pregunta por nuestras opciones de menús y paquetes.</p>
            </div>
            <div class="servicio">
                <h3>Talleres de Repostería</h3>
                <p>Organizamos talleres de repostería donde podrás aprender a hacer 
                    <br>nuestros deliciosos pays. Ideal para grupos pequeños y grandes.</p>
            </div>
        </section>
    </center>
</body>
</html>


