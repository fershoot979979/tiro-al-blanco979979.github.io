<?php
session_start();
if (!isset($_SESSION['UsuarioID'])) {
    header("Location: Sesion.php");
    exit();
}
$usuarioNombre = isset($_SESSION['Nombre']) ? $_SESSION['Nombre'] : 'Usuario';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="estilos1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Delicias de Pays</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="logoPag.png" height="50" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="Pagina.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Productos.php">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Quienes somos.php">Quienes somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Ubicacion.php">Ubicación</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Politica.php">Política de Privacidad</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Contacto.php">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Carrito.php">Carrito</a>
                        </li>
                    </ul>
                    <span class="navbar-text text-white mr-3">
                        <img src="Icono.jpg" height="30" alt="Icono Usuario"> <?php echo htmlspecialchars($usuarioNombre); ?>
                    </span>
                    <span class="navbar-text text-white ml-3">
                        ¡Bienvenido, <?php echo htmlspecialchars($usuarioNombre); ?>!
                    </span>
                    <a href="logout.php?logout=true" class="btn btn-outline-light ml-3">Cerrar Sesión</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section id="bienvenida" class="bienvenida">
            <div class="container">
                <h2 class="text-center">¡Bienvenidos a Delicias de Pays!</h2>
                <p class="text-center">En Delicias de Pays, nos enorgullecemos de ofrecer las mejores tartas y pays artesanales que deleitan a todos los paladares...</p>
                <h3 class="text-center">¿Por qué elegir Delicias de Pays?</h3>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item">Ingredientes de la Más Alta Calidad</li>
                    <li class="list-group-item">Recetas Artesanales</li>
                    <li class="list-group-item">Variedad de Sabores</li>
                </ul>
                <p class="text-center mt-3">¡Gracias por Visitarnos!</p>
                <p class="text-center">Estamos encantados de tenerte aquí y esperamos que encuentres el pay perfecto...</p>
                <img src="bienvenido.jpeg" class="img-fluid mx-auto d-block" alt="Bienvenido">
            </div>
        </section>

        <section id="productos" class="productos py-5">
            <div class="container">
                <h2 class="text-center mb-4">Nuestros Productos</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="manzana.jpeg" class="card-img-top" alt="Pay de Manzana">
                            <div class="card-body">
                                <h3 class="card-title">Pay de Manzana</h3>
                                <p class="card-text">Un clásico favorito con manzanas frescas y canela. Excelente opción para la familia.</p>
                                <p class="precio card-text">$40.00 pesos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="piña.jpg" class="card-img-top" alt="Pay de Piña">
                            <div class="card-body">
                                <h3 class="card-title">Pay de Piña</h3>
                                <p class="card-text">Un clásico favorito con piña fresca y un gran sabor.</p>
                                <p class="precio card-text">$32.00 pesos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="durazno.jpg" class="card-img-top" alt="Pay de Durazno">
                            <div class="card-body">
                                <h3 class="card-title">Pay de Durazno</h3>
                                <p class="card-text">Un clásico favorito con durazno, ideal para toda la familia.</p>
                                <p class="precio card-text">$32.00 pesos</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contacto" class="contacto py-5">
            <div class="container">
                <h2 class="text-center mb-4">Contacto</h2>
                <p class="text-center mb-4">¿Tienes alguna pregunta o comentario? ¡Contáctanos!</p>
                <form>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="mensaje">Mensaje:</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </section>
    </main>

    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2023 Delicias de Pays - ¡Tu mejor opción para comprar tus Pays!</p>
            <p>
                <a href="#" class="text-white mr-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white mr-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
            </p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
