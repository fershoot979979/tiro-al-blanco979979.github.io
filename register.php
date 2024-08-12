<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mysqli = new mysqli("localhost", "root", "", "pays");

    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if (isset($_POST['register'])) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $fechaRegistro = date("Y-m-d");
-
        $sql = "INSERT INTO usuarios (Nombre, Apellido, Correo, Contraseña, Telefono, Direccion, FechaRegistro) VALUES ('$nombre', '$apellido', '$correo', '$contraseña', '$telefono', '$direccion', '$fechaRegistro')";

        if ($mysqli->query($sql) === TRUE) {
            echo "Registro exitoso";
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }

    session_start();

    // Aquí va tu lógica de registro, como guardar el usuario en la base de datos
    // ...
    
    // Suponiendo que obtienes el nombre del usuario registrado como $usuarioNombre
    $_SESSION['UsuarioID'] = $usuarioID; // ID del usuario registrado
    $_SESSION['Nombre'] = $Nombre; // Nombre del usuario registrado
    
    // Redirigir a la página principal después del registro
    header("Location: Pagina.php");
    exit();
    

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="register-container">
            <h2 class="register-title">Registro de Usuario</h2>
            <form method="post" class="register-form">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="form-group">
                    <label for="contraseña">Contraseña</label>
                    <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                </div>
                <button type="submit" class="btn btn-custom btn-block" name="register">Registrarse</button>
            </form>
            <div class="text-center mt-3">
                <a href="Sesion.php">¿Ya tienes una cuenta? Inicia Sesión</a>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
