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
  <title>Baja de Producto</title>
</head>
<body>
  <h2>Baja de Producto</h2>
  <form id="formBaja_producto" action="../php/baja_producto.php" method="POST">
    <label>ID del Producto a eliminar:</label><br>
    <input type="number" name="id" required><br><br>

    <input type="submit" value="Eliminar Producto">
  </form>

    <a href="../componentes/altaybaja.php">Volver</a>
</body>
</html>
