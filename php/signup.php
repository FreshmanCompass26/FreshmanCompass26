<<<<<<< HEAD
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
</head>
<body>

<form action="php/guardar.php" method="POST">

    <input type="text" name="nombre" placeholder="Nombre">

    <input type="email" name="email" placeholder="Email">

    <input type="password" name="password" placeholder="Contraseña">

    <button type="submit">
        Registrarse
    </button>

</form>

</body>
</html>
=======
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
>>>>>>> 00aaff8d652fe4528c2f5a710b39db98de9049ef
