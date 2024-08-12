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



// Array de productos a insertar
$productos = [
    ["Pay de Manzana", "Un clásico favorito con manzanas frescas y canela. Excelente opción para la familia.", 40.00, "manzana.jpeg"],
    ["Pay de Piña", "Un clásico favorito con piña fresca y un gran sabor.", 32.00, "piña.jpg"],
    ["Pay de Durazno", "Un clásico favorito con Durazno, ideal para toda la familia.", 32.00, "durazno.jpg"],
    ["Pay de Fresa", "Delicioso pay con fresas frescas, perfecto para cualquier ocasión.", 35.00, "fresa.jpg"],
    ["Pay de Queso", "Un suave y cremoso pay de queso, ideal para los amantes del queso.", 38.00, "queso.jpg"],
    ["Pay de Chocolate", "Para los amantes del chocolate, un pay rico y cremoso.", 40.00, "chocolate.jpeg"],
    ["Pay de Limón", "Un delicioso pay con un toque de acidez de limón.", 35.00, "limon.jpg"],
    ["Pay de Coco", "Un pay tropical con sabor a coco fresco.", 37.00, "coco.jpg"],
    ["Pay de Zarzamora", "Un exquisito pay con zarzamoras frescas.", 42.00, "zarzamora.jpeg"],
    ["Pay de Mango", "Un fresco y jugoso pay de mango tropical.", 39.00, "mango.jpg"],
    ["Pay de Nuez", "Un delicioso pay con nueces crujientes.", 40.00, "nuez.jpg"],
    ["Pay de Café", "Un pay perfecto para los amantes del café.", 36.00, "cafe.jpg"],
    ["Pay de Plátano", "Un delicioso pay de plátano maduro.", 34.00, "platano.jpg"],
    ["Pay de Guayaba", "Un exótico pay de guayaba tropical.", 38.00, "guayaba.jpg"],
    ["Pay de Almendra", "Un crujiente pay con almendras tostadas.", 41.00, "almendra.jpg"],
    ["Pay de Frambuesa", "Un delicioso pay con frambuesas frescas.", 42.00, "frambuesa.jpg"],
    ["Pay de Blueberry", "Un exquisito pay con arándanos frescos.", 45.00, "blueberry.jpg"],
    ["Pay de Kiwi", "Un refrescante pay de kiwi tropical.", 39.00, "kiwi.jpg"],
    ["Pay de Mandarina", "Un jugoso pay de mandarina fresca.", 36.00, "mandarina.jpg"],
    ["Pay de Pistacho", "Un cremoso pay de pistacho, ideal para los amantes de los frutos secos.", 44.00, "pistaches.jpg"],
    ["Pay de Cereza", "Un clásico pay con cerezas frescas y jugosas.", 43.00, "cereza.jpg"],
    ["Pay de Maracuyá", "Un exótico pay con sabor a maracuyá tropical.", 38.00, "maracuya.jpg"],
    ["Pay de Higo", "Un delicioso pay de higos frescos.", 41.00, "higo.jpg"],
    ["Pay de Papaya", "Un jugoso pay de papaya tropical.", 37.00, "papaya.jpg"]
];

// Insertar cada producto en la tabla
foreach ($productos as $producto) {
    $nombre = $producto[0];
    $descripcion = $producto[1];
    $precio = $producto[2];
    $imagen = $producto[3];

    $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES ('$nombre', '$descripcion', $precio, '$imagen')";

    if ($conn->query($sql) === TRUE) {
        echo "Producto '$nombre' insertado exitosamente.<br>";
    } else {
        echo "Error al insertar el producto '$nombre': " . $conn->error . "<br>";
    }
}

// Cerrar la conexión
$conn->close();
?>
