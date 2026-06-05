<?php

// ===============================
// CONEXIÓN A LA BASE DE DATOS
// ===============================

$host = "localhost";
$user = "root";
$pass = "";
$db   = "freshman_db";

// ===============================
// CREAR CONEXIÓN
// ===============================

$conn = new mysqli($host, $user, $pass, $db);

// ===============================
// VERIFICAR CONEXIÓN
// ===============================

if ($conn->connect_error) {

    die("Error de conexión: " . $conn->connect_error);

}

// ⚠️ NO PONGAS ECHO AQUÍ
// porque rompe los header(Location)

?>