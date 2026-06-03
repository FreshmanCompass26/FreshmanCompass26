<?php

session_start();

include("conexion.php");

$nombre   = trim($_POST['nombre']);
$apellido = trim($_POST['apellido']);
$email    = trim($_POST['email']);
$password = $_POST['password'];
$phone    = trim($_POST['phone']);

$check = $conn->prepare(
    "SELECT id FROM usuarios WHERE email = ?"
);

$check->bind_param("s", $email);
$check->execute();

$resultado = $check->get_result();

if ($resultado->num_rows > 0) {

    echo "
    <script>
        alert('Este correo ya está registrado.');
        window.history.back();
    </script>
    ";

    exit();
}

$passwordHash = password_hash(
    $password,
    PASSWORD_DEFAULT
);

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

if ($stmt->execute()) {

    $id_usuario = $conn->insert_id;

    $_SESSION['usuario_id'] = $id_usuario;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['email'] = $email;

   

    header("Location: ../index.php");
    exit();

} else {

    echo "Error al registrar usuario: "
        . $stmt->error;

}

$stmt->close();
$check->close();
$conn->close();

?>