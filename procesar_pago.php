<?php
session_start();
include 'conex.php'; // Incluir el archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioID = $_SESSION['UsuarioID'];
    $metodo_pago = $_POST['metodo_pago'];
    $total = $_POST['total'];

    // Validar los datos recibidos
    if (empty($usuarioID) || empty($metodo_pago) || empty($total)) {
        echo "Todos los campos son obligatorios.";
        exit();
    }

    // Insertar los datos del pago en la base de datos
    $sql = "INSERT INTO pagos (UsuarioID, metodo_pago, total) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isd", $usuarioID, $metodo_pago, $total);

    if ($stmt->execute()) {
        // Redirigir a una página de confirmación de pago
        header("Location: pago_realizado.php");
        exit();
    } else {
        echo "Error al procesar el pago: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
