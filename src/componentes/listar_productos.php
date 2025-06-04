<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../index.html");
    exit();
}

include '../php/conexion.php';

$sql = "SELECT * FROM producto";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Productos</title>
</head>
<body>
  <h2>Lista de Productos</h2>

  <table border="1">
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Código</th>
      <th>Categoría</th>
      <th>Proveedor ID</th>
      <th>Stock Actual</th>
      <th>Stock Mínimo</th>
      <th>Precio Venta</th>
      <th>Acciones</th>
    </tr>

    <?php while ($row = $resultado->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nombre'] ?></td>
        <td><?= $row['codigo'] ?></td>
        <td><?= $row['categoria'] ?></td>
        <td><?= $row['proveedor_id'] ?></td>
        <td><?= $row['stock_actual'] ?></td>
        <td><?= $row['stock_minimo'] ?></td>
        <td><?= $row['precio_venta'] ?></td>
        <td>
          <a href="formEditar_producto.php?id=<?= $row['id'] ?>">Editar</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>

  <br>
  <a href="altaybaja.php">Volver</a>
</body>
</html>

<?php $conexion->close(); ?>
