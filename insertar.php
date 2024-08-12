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

// Lista de productos
$productos = [
    ["Pay de Manzana", 40.00, "Un clásico favorito con manzanas frescas y canela. Excelente opción para la familia.", "manzana.jpeg"],
    ["Pay de Piña", 32.00, "Un clásico favorito con piña fresca y un gran sabor.", "piña.jpg"],
    ["Pay de Durazno", 32.00, "Un clásico favorito con Durazno, ideal para toda la familia.", "durazno.jpg"],
    ["Pay de Fresa", 35.00, "Delicioso pay con fresas frescas, perfecto para cualquier ocasión.", "fresa.jpg"],
    ["Pay de Queso", 38.00, "Un suave y cremoso pay de queso, ideal para los amantes del queso.", "queso.jpg"],
    ["Pay de Chocolate", 40.00, "Para los amantes del chocolate, un pay rico y cremoso.", "chocolate.jpeg"],
    ["Pay de Limón", 35.00, "Un delicioso pay con un toque de acidez de limón.", "limon.jpg"],
    ["Pay de Coco", 37.00, "Un pay tropical con sabor a coco fresco.", "coco.jpg"],
    ["Pay de Zarzamora", 42.00, "Un exquisito pay con zarzamoras frescas.", "zarzamora.jpeg"],
    ["Pay de Mango", 39.00, "Un fresco y jugoso pay de mango tropical.", "mango.jpg"],
    ["Pay de Nuez", 40.00, "Un delicioso pay con nueces crujientes.", "nuez.jpg"],
    ["Pay de Café", 36.00, "Un pay perfecto para los amantes del café.", "cafe.jpg"],
    ["Pay de Plátano", 34.00, "Un delicioso pay de plátano maduro.", "platano.jpg"],
    ["Pay de Guayaba", 38.00, "Un exótico pay de guayaba tropical.", "guayaba.jpg"],
    ["Pay de Almendra", 41.00, "Un crujiente pay con almendras tostadas.", "almendra.jpg"],
    ["Pay de Frambuesa", 42.00, "Un delicioso pay con frambuesas frescas.", "frambuesa.jpg"],
    ["Pay de Blueberry", 45.00, "Un exquisito pay con arándanos frescos.", "blueberry.jpg"],
    ["Pay de Kiwi", 39.00, "Un refrescante pay de kiwi tropical.", "kiwi.jpg"],
    ["Pay de Mandarina", 36.00, "Un jugoso pay de mandarina fresca.", "mandarina.jpg"],
    ["Pay de Pistacho", 44.00, "Un cremoso pay de pistacho, ideal para los amantes de los frutos secos.", "pistaches.jpg"],
    ["Pay de Cereza", 43.00, "Un clásico pay con cerezas frescas y jugosas.", "cereza.jpg"],
    ["Pay de Maracuyá", 38.00, "Un exótico pay con sabor a maracuyá tropical.", "maracuya.jpg"],
    ["Pay de Higo", 41.00, "Un delicioso pay de higos frescos.", "higo.jpg"],
    ["Pay de Papaya", 37.00, "Un jugoso pay de papaya tropical.", "papaya.jpg"]
];

// Inserción de productos
foreach ($productos as $producto) {
    $nombre = $producto[0];
    $precio = $producto[1];
    $descripcion = $producto[2];
    $imagen = $producto[3];

    $sql = "INSERT INTO producto (nombre, precio, descripcion, imagen) VALUES ('$nombre', '$precio', '$descripcion', '$imagen')";

    if ($conn->query($sql) === TRUE) {
        echo "Producto '$nombre' agregado exitosamente<br>";
    } else {
        echo "Error al agregar el producto '$nombre': " . $conn->error . "<br>";
    }
}

$conn->close();
?>
