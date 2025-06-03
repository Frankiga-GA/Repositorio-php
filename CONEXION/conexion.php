<?php
$conexion = new mysqli("localhost", "usuario", "contraseña", "nombre_base_datos");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>