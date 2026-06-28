<?php

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 🔹 Capturar datos del formulario (CORRECTOS)
    $nombre = trim($_POST['first_name']);
    $apellido = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['phone']);

    // 🔹 Encriptar contraseña
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // 🔹 Insertar en la base de datos
    $sql = "INSERT INTO usuarios(nombre, apellido, email, password, phone)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sssss",
        $nombre,
        $apellido,
        $email,
        $passwordHash,
        $phone
    );

    if ($stmt->execute()) {

        // ✅ 🔥 INICIO DE SESIÓN AUTOMÁTICO
        session_start();

        $_SESSION['nombre'] = $nombre;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;

        // 🔥 Redirigir al index ya logueado
        header("Location: ../index.php");
        exit();

    } else {
        echo "Error al registrarse";
    }
}
?>