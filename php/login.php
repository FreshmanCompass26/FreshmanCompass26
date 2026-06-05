<?php

session_start();
<<<<<<< HEAD
=======

>>>>>>> 00aaff8d652fe4528c2f5a710b39db98de9049ef
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM usuarios WHERE email = ?";

    $stmt = $conn->prepare($sql);
<<<<<<< HEAD
    $stmt->bind_param("s", $email);
=======

    $stmt->bind_param("s", $email);

>>>>>>> 00aaff8d652fe4528c2f5a710b39db98de9049ef
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($usuario = $resultado->fetch_assoc()) {

<<<<<<< HEAD
        // ✅ Verificar contraseña
        if (password_verify($password, $usuario['password'])) {

            // ✅ Guardar sesión
            $_SESSION['usuario_id'] = $usuario['usuario_ID'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['phone'] = $usuario['phone']; // 👈 agregado

            // ✅ Redirigir
=======
        if (password_verify($password, $usuario['password'])) {

            $_SESSION['usuario_id'] = $usuario['usuario_ID'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['phone'] = $usuario['phone'];

>>>>>>> 00aaff8d652fe4528c2f5a710b39db98de9049ef
            header("Location: ../index.php");
            exit();

        } else {
<<<<<<< HEAD
            echo "Contraseña incorrecta 😭";
        }

    } else {
        echo "Usuario no encontrado 😭";
    }
}
?>
``
=======

            echo "Contraseña incorrecta";

        }

    } else {

        echo "Usuario no encontrado";

    }

}
?>
>>>>>>> 00aaff8d652fe4528c2f5a710b39db98de9049ef
