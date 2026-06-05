<?php

<<<<<<< HEAD
session_start(); // ✅ IMPORTANTE
=======
session_start();
>>>>>>> 00aaff8d652fe4528c2f5a710b39db98de9049ef

include("conexion.php");

$nombre = $_POST['nombre'];
<<<<<<< HEAD
$email = $_POST['email'];
$password = $_POST['password'];

// 🔐 encriptar
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios(nombre, email, password)
VALUES('$nombre', '$email', '$passwordHash')";

if($conn->query($sql) === TRUE){

    // ✅ GUARDAR SESIÓN AUTOMÁTICAMENTE
=======
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];


$passwordHash = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO usuarioss
(nombre, apellido, email, password, phone)
VALUES (?, ?, ?, ?, ?)";


$stmt = $conn->prepare($sql);


$stmt->bind_param(
    "sssss",
    $nombre,
    $apellido,
    $email,
    $passwordHash,
    $phone
);

if($stmt->execute()){

>>>>>>> 00aaff8d652fe4528c2f5a710b39db98de9049ef
    $_SESSION['nombre'] = $nombre;
    $_SESSION['email'] = $email;

    header("Location: ../index.php");
    exit();

}else{
<<<<<<< HEAD
    echo "Error: " . $conn->error;
}

$conn->close();
=======

    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

>>>>>>> 00aaff8d652fe4528c2f5a710b39db98de9049ef
?>