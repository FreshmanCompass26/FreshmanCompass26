<?php

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$baseDatos = "fcompass_db";

$conexion = new mysqli(
    $servidor,
    $usuario,
    $contrasena,
    $baseDatos
);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

?>