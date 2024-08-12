<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['UsuarioID'])) {
    header("Location: Sesion.php"); // Redirigir a la página de inicio de sesión si no está logueado
    exit();
}

// Generar un número de referencia único
$referencia = 'REF' . strtoupper(uniqid());

// Guardar la referencia en la base de datos junto con el carrito
$usuarioID = $_SESSION['UsuarioID'];
$servername = "localhost"; // Cambia esto por el nombre de tu servidor
$username = "root"; // Cambia esto por tu usuario de la base de datos
$password = ""; // Cambia esto por tu contraseña de la base de datos
$dbname = "pays"; // Cambia esto por el nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $producto = $item['name'];
        $precio = $item['price'];
        $cantidad = $item['quantity'];
        $total = $precio * $cantidad;

        $stmt = $conn->prepare("INSERT INTO pagos (usuario_id, producto, precio, cantidad, total, referencia) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issdis", $usuarioID, $producto, $precio, $cantidad, $total, $referencia);

        if ($stmt->execute()) {
            echo "Registro de pago guardado exitosamente.<br>";
        } else {
            echo "Error al guardar el registro de pago: " . $stmt->error . "<br>";
        }

        $stmt->close();
    }

    // Limpiar el carrito después de guardar los registros de pago
    unset($_SESSION['cart']);
} else {
    echo "No hay productos en el carrito.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Diseño web.css">
    <title>Pago en Efectivo</title>
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
        .container .referencia {
            font-size: 24px;
            font-weight: bold;
            color: #f44336;
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
        <h2>Pago en Efectivo</h2>
        <p>Por favor, utiliza la siguiente referencia para realizar tu pago en Oxxo o Seven:</p>
        <p class="referencia"><?php echo $referencia; ?></p>
        <a href="Productos.php">Volver a la Tienda</a>
    </div>
</body>
</html>
