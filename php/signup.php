<?php

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['phone']);

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios(nombre, email, password, phone)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssss",
        $nombre,
        $email,
        $passwordHash,
        $phone
    );

    if ($stmt->execute()) {

        header("Location: ../login.html");
        exit();

    } else {

        echo "Error al registrarse";

    }

}
?>