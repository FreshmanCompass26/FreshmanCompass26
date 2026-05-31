<?php

session_start();

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM usuarios WHERE email = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $email);

    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($usuario = $resultado->fetch_assoc()) {

        if (password_verify($password, $usuario['password'])) {

            // SESIONES
            $_SESSION['usuario_id'] = $usuario['usuario_ID'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['phone'] = $usuario['phone'];

            header("Location: ../index.php");
            exit();

        } else {

            echo "Contraseña incorrecta";

        }

    } else {

        echo "Usuario no encontrado";

    }

}
?>