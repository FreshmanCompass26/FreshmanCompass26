<?php

session_start();

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // El SELECT * ya nos va a traer la nueva columna 'rol' automáticamente
    $sql = "SELECT * FROM usuarios WHERE email = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($usuario = $resultado->fetch_assoc()) {

        if (password_verify($password, $usuario['password'])) {

            // Guardamos tus variables de siempre
            $_SESSION['usuario_id'] = $usuario['usuario_ID'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['phone'] = $usuario['phone'];
            
            // NUEVO: Guardamos el rol en la sesión para proteger las páginas privadas
            $_SESSION['rol'] = $usuario['rol']; 

            // NUEVO: Evaluamos a dónde mandar al usuario según su rol
            if ($usuario['rol'] === 'psicologa') {
                // Si es psicóloga, la mandamos a su panel privado
                header("Location: ../dashboard_psicologa.php");
            } else {
                // Si es un alumno normal, va al index de siempre
                header("Location: ../index.php");
            }
            exit();

        } else {

            $_SESSION['login_error'] = "Contraseña incorrecta";
            header("Location: ../login.php");
            exit();

        }

    } else {

        $_SESSION['login_error'] = "Usuario no encontrado";
        header("Location: ../login.php");
        exit();

    }

}
?>