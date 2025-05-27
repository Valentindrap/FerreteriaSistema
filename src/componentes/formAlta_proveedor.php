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
  <title>Alta de Proveedor</title>
</head>
<body>
  <h2>Alta de Proveedor</h2>
  <form id="formAlta_proveedor" action="../php/alta_proveedor.php" method="POST">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br>

    <label>Contacto:</label><br>
    <input type="text" name="contacto" required><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <input type="submit" value="Agregar Proveedor">
  </form>
</body>
</html>
