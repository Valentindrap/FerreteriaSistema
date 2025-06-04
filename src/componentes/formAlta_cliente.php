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
  <title>Alta de Cliente</title>
</head>
<body>
  <h2>Alta de Cliente</h2>
  <form id="formAlta_cliente" action="../php/alta_cliente.php" method="POST">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br>

    <label>DNI/CUIT:</label><br>
    <input type="text" name="DNI_CUIT" required><br>

    <label>Teléfono:</label><br>
    <input type="text" name="telefono" required><br>

    <label>Dirección:</label><br>
    <input type="text" name="direccion" required><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <input type="submit" value="Agregar Cliente">
  </form>

  <a href="../componentes/altaybaja.php">Volver</a>
</body>
</html>
