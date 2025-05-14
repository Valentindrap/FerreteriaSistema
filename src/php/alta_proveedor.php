<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $contacto = $_POST["contacto"];
    $email = $_POST["email"];

    $sql = "INSERT INTO proveedor (nombre, contacto, email) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sss", $nombre, $contacto, $email);

    if ($stmt->execute()) {
        echo "Proveedor agregado correctamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}
?>
