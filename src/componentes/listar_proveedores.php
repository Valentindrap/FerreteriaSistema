<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../index.html");
    exit();
}

include '../php/conexion.php';

$sql = "SELECT * FROM proveedor";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Proveedores</title>
</head>
<body>
  <h2>Lista de Proveedores</h2>

  <table border="1">
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Contacto</th>
    <th>Email</th>
  </tr>
  <?php while ($fila = $resultado->fetch_assoc()): ?>
    <tr>
      <td><?= $fila['id'] ?></td>
      <td><?= $fila['nombre'] ?></td>
      <td><?= $fila['contacto'] ?></td>
      <td><?= $fila['email'] ?></td>
    </tr>
  <?php endwhile; ?>
</table>


  <br>
  <a href="../componentes/altaybaja.php">Volver</a>
</body>
</html>

<?php $conexion->close(); ?>
