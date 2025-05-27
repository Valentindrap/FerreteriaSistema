<?php
session_start();

// Verifica si hay una sesión iniciada de administrador
if (!isset($_SESSION['admin'])) {
    header("Location: adminlogin.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Alta de Producto</title>
</head>
<body>
  <h2>Alta de Producto</h2>
  <form id="formAlta_producto" action="../php/alta_producto.php" method="POST">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br>

    <label>Código:</label><br>
    <input type="text" name="codigo" required><br>

    <label>Categoría:</label><br>
    <input type="text" name="categoria" required><br>

    <label>ID Proveedor:</label><br>
    <input type="number" name="proveedor_id" required><br>

    <label>Stock Actual:</label><br>
    <input type="number" name="stock_actual" required><br>

    <label>Stock Mínimo:</label><br>
    <input type="number" name="stock_minimo" required><br>

    <label>Precio de Venta:</label><br>
    <input type="number" step="0.01" name="precio_venta" required><br><br>

    <input type="submit" value="Agregar Producto">
  </form>
</body>
</html>
