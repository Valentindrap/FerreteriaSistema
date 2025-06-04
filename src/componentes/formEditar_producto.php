<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../index.html");
    exit();
}

include '../php/conexion.php';

$id = $_GET['id'];
$sql = "SELECT * FROM producto WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$producto = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Producto</title>
</head>
<body>
  <h2>Editar Producto</h2>
  <form action="../php/editar_producto.php" method="POST">
    <input type="hidden" name="id" value="<?= $producto['id'] ?>">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="<?= $producto['nombre'] ?>" required><br>

    <label>Código:</label><br>
    <input type="text" name="codigo" value="<?= $producto['codigo'] ?>" required><br>

    <label>Categoría:</label><br>
    <input type="text" name="categoria" value="<?= $producto['categoria'] ?>" required><br>

    <label>Proveedor ID:</label><br>
    <input type="number" name="proveedor_id" value="<?= $producto['proveedor_id'] ?>" required><br>

    <label>Stock actual:</label><br>
    <input type="number" name="stock_actual" value="<?= $producto['stock_actual'] ?>" required><br>

    <label>Stock mínimo:</label><br>
    <input type="number" name="stock_minimo" value="<?= $producto['stock_minimo'] ?>" required><br>

    <label>Precio de venta:</label><br>
    <input type="number" step="0.01" name="precio_venta" value="<?= $producto['precio_venta'] ?>" required><br><br>

    <input type="submit" value="Guardar cambios">
  </form>

  <a href="../componentes/altaybaja.php">Volver</a>
</body>
</html>
