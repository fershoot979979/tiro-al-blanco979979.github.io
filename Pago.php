<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['UsuarioID'])) {
    header("Location: Sesion.php"); // Redirigir a la página de inicio de sesión si no está logueado
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $metodo_pago = $_POST['metodo_pago'];

    if ($metodo_pago == 'tarjeta') {
        header("Location: PagoTarjeta.php");
    } elseif ($metodo_pago == 'efectivo') {
        header("Location: PagoEfectivo.php");
    } else {
        echo "Método de pago no válido.";
    }
    exit();
} else {
    echo "Método de solicitud no válido.";
}
?>
