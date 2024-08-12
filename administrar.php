<?php
session_start();

// Verificar si el usuario está logueado y es administrador
if (!isset($_SESSION['UsuarioID']) || $_SESSION['Role'] !== 'admin') {
    header("Location: Sesion.php"); // Redirigir a la página de inicio de sesión si no está logueado o no es admin
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

// Eliminar producto si se ha enviado el formulario de eliminación
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eliminar'])) {
    $id = $conn->real_escape_string($_POST['id']);

    $sql = "DELETE FROM producto WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "Producto eliminado exitosamente";
    } else {
        $mensaje = "Error al eliminar el producto: " . $conn->error;
    }
}

// Obtener lista de productos
$sql = "SELECT id, nombre FROM producto";
$result = $conn->query($sql);
$productos = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Eliminar Productos</title>
</head>
<body>
    <h1>Administrar Productos</h1>

    <?php if (isset($mensaje)): ?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?php echo $producto['id']; ?></td>
                    <td><?php echo $producto['nombre']; ?></td>
                    <td>
                        <form method="POST" action="">
                            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                            <button type="submit" name="eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
