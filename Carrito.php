<?php
session_start();

// Verificar si se ha solicitado cerrar sesión
if (isset($_GET['logout'])) {
    session_destroy(); // Destruir todas las variables de sesión
    header("Location: Sesion.php"); // Redirigir a la página de inicio de sesión
    exit();
}

// Verificar si el usuario está logueado
if (!isset($_SESSION['UsuarioID'])) {
    header("Location: Sesion.php"); // Redirigir a la página de inicio de sesión si no está logueado
    exit();
}

// Añadir producto al carrito
if (isset($_GET['add'])) {
    $product = $_GET['add'];
    $price = $_GET['price'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (!isset($_SESSION['cart'][$product])) {
        $_SESSION['cart'][$product] = [
            'name' => $product,
            'price' => $price,
            'quantity' => 1
        ];
    } else {
        $_SESSION['cart'][$product]['quantity']++;
    }
}

// Disminuir cantidad del producto en el carrito
if (isset($_GET['subtract'])) {
    $product = $_GET['subtract'];
    if (isset($_SESSION['cart'][$product]) && $_SESSION['cart'][$product]['quantity'] > 1) {
        $_SESSION['cart'][$product]['quantity']--;
    } else {
        unset($_SESSION['cart'][$product]);
    }
}

// Eliminar producto del carrito
if (isset($_GET['remove'])) {
    $product = $_GET['remove'];
    if (isset($_SESSION['cart'][$product])) {
        unset($_SESSION['cart'][$product]);
    }
}

// Limpiar carrito
if (isset($_GET['clear'])) {
    unset($_SESSION['cart']);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Diseño web.css">
    <title>Carrito de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        .cart-table {
            width: 100%;
            border-collapse: collapse;
        }
        .cart-table th, .cart-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .cart-table th {
            background-color: #f2f2f2;
        }
        .cart-table td {
            text-align: center;
        }
        .cart-table td .remove-btn {
            color: red;
            text-decoration: none;
        }
        .cart-table td .quantity-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .total {
            font-weight: bold;
            margin-top: 20px;
        }
        .actions {
            margin-top: 20px;
        }
        .actions a {
            margin: 0 10px;
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .actions a.clear-cart {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Carrito de Compras</h2>

        <?php if (!empty($_SESSION['cart'])): ?>
            <table class="cart-table">
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
                <?php 
                $total = 0;
                foreach ($_SESSION['cart'] as $item): 
                    $item_total = $item['price'] * $item['quantity'];
                    $total += $item_total;
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                        <td><?php echo number_format($item['price'], 2); ?> pesos</td>
                        <td>
                            <a href="Carrito.php?subtract=<?php echo urlencode($item['name']); ?>" class="quantity-btn">-1</a>
                            <?php echo $item['quantity']; ?>
                            <a href="Carrito.php?add=<?php echo urlencode($item['name']); ?>&price=<?php echo $item['price']; ?>" class="quantity-btn">+1</a>
                        </td>
                        <td><?php echo number_format($item_total, 2); ?> pesos</td>
                        <td>
                            <a href="Carrito.php?remove=<?php echo urlencode($item['name']); ?>" class="remove-btn">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" class="total">Total</td>
                    <td colspan="2" class="total"><?php echo number_format($total, 2); ?> pesos</td>
                </tr>
            </table>

            <div class="actions">
                <a href="Productos.php">Seguir Comprando</a>
                <a href="Carrito.php?clear" class="clear-cart">Limpiar Carrito</a>
            </div>

            <div class="payment-options">
                <h3>Selecciona el método de pago:</h3>
                <form action="Pago.php" method="post">
                    <input type="radio" id="tarjeta" name="metodo_pago" value="tarjeta" required>
                    <label for="tarjeta">Tarjeta de Crédito o Débito</label><br>
                    <input type="radio" id="efectivo" name="metodo_pago" value="efectivo" required>
                    <label for="efectivo">Efectivo (Oxxo, Seven)</label><br><br>
                    <button type="submit">Proceder al Pago</button>
                </form>
            </div>

        <?php else: ?>
            <p>No hay productos en el carrito.</p>
            <a href="Productos.php">Ver Productos</a>
        <?php endif; ?>
    </div>
</body>
</html>
