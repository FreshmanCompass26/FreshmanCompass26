<?php

session_start();

include("conexion.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];


$passwordHash = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO usuarios
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

    $_SESSION['nombre'] = $nombre;
    $_SESSION['email'] = $email;

    header("Location: ../index.php");
    exit();

}else{

    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>