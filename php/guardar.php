<?php

session_start(); // ✅ IMPORTANTE

include("conexion.php");

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];

// 🔐 encriptar
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios(nombre, email, password)
VALUES('$nombre', '$email', '$passwordHash')";

if($conn->query($sql) === TRUE){

    // ✅ GUARDAR SESIÓN AUTOMÁTICAMENTE
    $_SESSION['nombre'] = $nombre;
    $_SESSION['email'] = $email;

    header("Location: ../index.php");
    exit();

}else{
    echo "Error: " . $conn->error;
}

$conn->close();
?>