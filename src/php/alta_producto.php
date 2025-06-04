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

    // Verificar si el proveedor existe
    $checkProveedor = $conexion->prepare("SELECT id FROM proveedor WHERE id = ?");
    $checkProveedor->bind_param("i", $proveedor_id);
    $checkProveedor->execute();
    $resultado = $checkProveedor->get_result();

    if ($resultado->num_rows === 0) {
        // Proveedor no existe
        echo "<script>
            alert('Error: El proveedor no existe.');
            window.location.href = '../componentes/formAlta_producto.php';
        </script>";
    } else {
        // Insertar el producto
        $sql = "INSERT INTO Producto (nombre, codigo, categoria, proveedor_id, stock_actual, stock_minimo, precio_venta)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        try {
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sssiiid", $nombre, $codigo, $categoria, $proveedor_id, $stock_actual, $stock_minimo, $precio_venta);

            if ($stmt->execute()) {
                echo "<script>
                    alert('Producto agregado correctamente.');
                    window.location.href = '../componentes/formAlta_producto.php';
                </script>";
            } else {
                echo "<script>
                    alert('Error al agregar el producto: " . addslashes($stmt->error) . "');
                    window.location.href = '../componentes/formAlta_producto.php';
                </script>";
            }

            $stmt->close();
        } catch (mysqli_sql_exception $e) {
            echo "<script>
                alert('Error inesperado: " . addslashes($e->getMessage()) . "');
                window.location.href = '../componentes/formAlta_producto.php';
            </script>";
        }
    }

    $checkProveedor->close();
    $conexion->close();
}
?>
