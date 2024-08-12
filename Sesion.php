<?php
// Mostrar errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        // Conectar a la base de datos
        $mysqli = new mysqli("localhost", "root", "", "pays");

        if ($mysqli->connect_errno) {
            die("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
        }

        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];

        // Consulta preparada para evitar SQL injection
        $sql = "SELECT UsuarioID, Nombre, Contraseña FROM usuarios WHERE Correo=?";
        $stmt = $mysqli->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("s", $correo);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($contraseña, $row['Contraseña'])) {
                    // Inicio de sesión exitoso, guardar UsuarioID y Nombre en la sesión
                    $_SESSION['UsuarioID'] = $row['UsuarioID'];
                    $_SESSION['Nombre'] = $row['Nombre']; // Guardar el nombre del usuario
                    $stmt->close();
                    $mysqli->close();
                    header("Location: Pagina.php");
                    exit();
                } else {
                    $error = "Contraseña incorrecta.";
                }
            } else {
                $error = "No existe una cuenta con ese correo.";
            }

            $stmt->close();
        } else {
            $error = "Error en la consulta: " . $mysqli->error;
        }

        $mysqli->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="register-container">
            <h2 class="register-title">Iniciar Sesión</h2>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form method="post" class="register-form">
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="form-group">
                    <label for="contraseña">Contraseña</label>
                    <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                </div>
                <button type="submit" class="btn btn-custom btn-block" name="login">Iniciar Sesión</button>
            </form>
            <div class="text-center mt-3">
                <p>¿No tienes una cuenta? <a href="register.php">Regístrate</a></p>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
