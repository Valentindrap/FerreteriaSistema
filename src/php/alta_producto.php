<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $codigo = $_POST["codigo"];
    $categoria = $_POST["categoria"];
    $proveedor_id = $_POST["proveedor_id"];
    $stock_actual = $_POST["stock_actual"];
    $stock_minimo = $_POST["stock_minimo"];
    $precio_venta = $_POST["precio_venta"];

    $sql = "INSERT INTO Producto (nombre, codigo, categoria, proveedor_id, stock_actual, stock_minimo, precio_venta)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssiiid", $nombre, $codigo, $categoria, $proveedor_id, $stock_actual, $stock_minimo, $precio_venta);

    if ($stmt->execute()) {
        echo "Producto agregado correctamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}
?>
