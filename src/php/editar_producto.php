<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $codigo = $_POST["codigo"];
    $categoria = $_POST["categoria"];
    $proveedor_id = $_POST["proveedor_id"];
    $stock_actual = $_POST["stock_actual"];
    $stock_minimo = $_POST["stock_minimo"];
    $precio_venta = $_POST["precio_venta"];

    $sql = "UPDATE producto SET nombre=?, codigo=?, categoria=?, proveedor_id=?, stock_actual=?, stock_minimo=?, precio_venta=?
            WHERE id=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssiiidi", $nombre, $codigo, $categoria, $proveedor_id, $stock_actual, $stock_minimo, $precio_venta, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Producto actualizado con éxito.'); window.location.href = '../componentes/formAlta_producto.php';</script>";
    } else {
        echo "<script>alert('Error al actualizar: " . addslashes($stmt->error) . "'); window.location.href = '../componentes/formAlta_producto.php';</script>";
    }

    $stmt->close();
    $conexion->close();
}
?>
