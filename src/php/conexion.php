<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_de_datos = "ferreteria_db";

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
?>
