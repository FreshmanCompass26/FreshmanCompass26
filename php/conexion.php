<?php

<<<<<<< HEAD
// ===============================
// CONEXIÓN A LA BASE DE DATOS
// ===============================

=======
>>>>>>> 00aaff8d652fe4528c2f5a710b39db98de9049ef
$host = "localhost";
$user = "root";
$pass = "";
$db   = "freshman_db";

<<<<<<< HEAD
// ===============================
// CREAR CONEXIÓN
// ===============================

$conn = new mysqli($host, $user, $pass, $db);

// ===============================
// VERIFICAR CONEXIÓN
// ===============================

=======
$conn = new mysqli($host, $user, $pass, $db);

>>>>>>> 00aaff8d652fe4528c2f5a710b39db98de9049ef
if ($conn->connect_error) {

    die("Error de conexión: " . $conn->connect_error);

}

<<<<<<< HEAD
// ⚠️ NO PONGAS ECHO AQUÍ
// porque rompe los header(Location)

=======
>>>>>>> 00aaff8d652fe4528c2f5a710b39db98de9049ef
?>