<?php
include("conexion.php");

$usuario = "admin";
$contrasena = password_hash("admin1234", PASSWORD_DEFAULT);

$sql = "INSERT INTO admins (usuario, contrasena) VALUES (?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $usuario, $contrasena);

if ($stmt->execute()) {
    echo "Admin creado con éxito.";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conexion->close();
?>
