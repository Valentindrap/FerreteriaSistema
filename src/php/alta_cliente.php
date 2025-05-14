<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $DNI_CUIT = $_POST["DNI_CUIT"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $email = $_POST["email"];


    $sql = "INSERT INTO cliente (nombre, DNI_CUIT, telefono, direccion, email) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);

    $stmt->bind_param("siiss", $nombre, $DNI_CUIT, $telefono, $direccion, $email);

    if ($stmt->execute()) {
        echo "Cliente agregado correctamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}
?>
