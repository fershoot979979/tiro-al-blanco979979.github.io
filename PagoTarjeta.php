<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['UsuarioID'])) {
    header("Location: Sesion.php"); // Redirigir a la página de inicio de sesión si no está logueado
    exit();
}

// Función para mostrar el mensaje de pago exitoso
function mostrarMensajePagoExitoso() {
    echo <<<HTML
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pago Realizado</title>
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
                width: 100%;
                max-width: 500px;
                margin: 0 auto;
            }
            .container h2 {
                color: #4CAF50;
            }
            .container p {
                margin-top: 20px;
                font-size: 18px;
            }
            .container a {
                text-decoration: none;
                color: #4CAF50;
                margin-top: 20px;
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Pago Realizado Exitosamente</h2>
            <p>¡Gracias! Tu pago ha sido procesado correctamente.</p>
            <a href="Productos.php">Volver a la Tienda</a>
        </div>
    </body>
    </html>
HTML;
}

// Procesar el formulario de pago al hacer clic en el botón "Pagar"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $cardNumber = $_POST['cardNumber'];
    $cardName = $_POST['cardName'];
    $expiryDate = $_POST['expiryDate'];
    $cvv = $_POST['cvv'];

    $usuarioID = $_SESSION['UsuarioID'];
    $servername = "localhost"; // Cambia esto por el nombre de tu servidor
    $username = "root"; // Cambia esto por tu usuario de la base de datos
    $password = ""; // Cambia esto por tu contraseña de la base de datos
    $dbname = "pays"; // Cambia esto por el nombre de tu base de datos

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertar los detalles de la tarjeta en la base de datos
    $stmt = $conn->prepare("INSERT INTO tarjetas (usuario_id, nombre_tarjeta, numero_tarjeta, fecha_expiracion, cvv) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $usuarioID, $cardName, $cardNumber, $expiryDate, $cvv);

    if ($stmt->execute()) {
        // Guardar la referencia en la base de datos junto con el carrito
        if (!empty($_SESSION['cart'])) {
            $referencia = 'REF' . strtoupper(uniqid());
            foreach ($_SESSION['cart'] as $item) {
                $producto = $item['name'];
                $precio = $item['price'];
                $cantidad = $item['quantity'];
                $total = $precio * $cantidad;

                $stmtPago = $conn->prepare("INSERT INTO pagos (usuario_id, producto, precio, cantidad, total, referencia) VALUES (?, ?, ?, ?, ?, ?)");
                $stmtPago->bind_param("issdis", $usuarioID, $producto, $precio, $cantidad, $total, $referencia);

                if ($stmtPago->execute()) {
                    // Éxito al guardar el registro de pago
                } else {
                    echo "Error al guardar el registro de pago: " . $stmtPago->error . "<br>";
                }

                $stmtPago->close();
            }

            // Limpiar el carrito después de guardar los registros de pago
            unset($_SESSION['cart']);

            // Mostrar mensaje de pago exitoso
            mostrarMensajePagoExitoso();
            exit(); // Terminar la ejecución después de mostrar el mensaje

        } else {
            echo "No hay productos en el carrito.";
        }
    } else {
        echo "Error al procesar el pago: " . $stmt->error . "<br>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Diseño web.css">
    <title>Pagar con Tarjeta</title>
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
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }
        .container h2 {
            color: #4CAF50;
        }
        .container form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container form input {
            margin-bottom: 15px;
            padding: 10px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .container form button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .container form button:hover {
            background-color: #45a049;
        }
        .container a {
            text-decoration: none;
            color: #4CAF50;
            margin-top: 20px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pagar con Tarjeta</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="text" name="cardNumber" placeholder="Número de Tarjeta" required>
            <input type="text" name="cardName" placeholder="Nombre en la Tarjeta" required>
            <input type="text" name="expiryDate" placeholder="Fecha de Expiración (MM/AA)" required>
            <input type="text" name="cvv" placeholder="CVV" required>
            <button type="submit">Pagar</button>
        </form>
        <a href="Productos.php">Volver a la Tienda</a>
    </div>
</body>
</html>
