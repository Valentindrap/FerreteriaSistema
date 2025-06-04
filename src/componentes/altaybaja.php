<?php
session_start();

// Verifica si hay una sesión iniciada de administrador
if (!isset($_SESSION['admin'])) {
    header("Location: ../index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ferretería - Panel Principal</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body class="body-container">

  <h1 class="main-title">Panel Principal - Ferretería</h1>

  <p style="text-align:right; margin-right: 20px;">
    Usuario: <strong><?php echo $_SESSION['admin']; ?></strong>
    | <a href="../php/logout.php" style="color: red;">Cerrar sesión</a>
  </p>

  <div class="section">
    <h2 class="section-title">Productos</h2>
    <a class="link-button" href="formAlta_producto.php">Alta Producto</a>
    <a class="link-button" href="formBaja_producto.php">Baja Producto</a>
    <a class="link-button" href="listar_productos.php">Lista de Productos</a>
  </div>

  <div class="section">
    <h2 class="section-title">Proveedores</h2>
    <a class="link-button" href="formAlta_proveedor.php">Alta Proveedor</a>
    <a class="link-button" href="formBaja_proveedor.php">Baja Proveedor</a>
    <a class="link-button" href="listar_proveedores.php">Lista de Proveedores</a>
  </div>

  <div class="section">
    <h2 class="section-title">Clientes</h2>
    <a class="link-button" href="formAlta_cliente.php">Alta Cliente</a>
    <a class="link-button" href="formBaja_cliente.php">Baja Cliente</a>
  </div>

</body>
</html>
