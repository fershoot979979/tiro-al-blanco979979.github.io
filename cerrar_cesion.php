<?php
session_start();
session_unset();
session_destroy();
header("Location: Pagina.php"); // Redirige a la página de inicio o a la página de inicio de sesión.
exit();
?>
