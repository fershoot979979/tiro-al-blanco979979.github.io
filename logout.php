<?php
session_start();

// Verificar si se ha solicitado cerrar sesión
if (isset($_GET['logout'])) {
    session_destroy(); // Destruir todas las variables de sesión
    header("Location: Sesion.php"); // Redirigir a la página de inicio de sesión
    exit();
}
?>
