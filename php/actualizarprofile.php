<?php

include("profile_conexion.php");

session_start(); // 🔥 AGREGA ESTO ARRIBA

$idUsuario = 3;

$nombre = $_POST['nombre'];
$fechaNacimiento = $_POST['fecha_nacimiento'];
$email = $_POST['email'];
$centroEscolar = $_POST['centro_escolar'];
$username = $_POST['username'];
$descripcion = $_POST['descripcion'];

$fotoNombre = $_FILES['foto']['name'];

if($fotoNombre != ""){
    $rutaTemp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($rutaTemp, __DIR__ . "/../img/" . $fotoNombre);

    $fotoSQL = ", foto_perfil='$fotoNombre'";
} else {
    $fotoSQL = "";
}

$sqlActualizar = "
UPDATE estudiantes
SET
nombre='$nombre',
fecha_nacimiento='$fechaNacimiento',
email='$email',
centro_escolar='$centroEscolar',
username='$username',
descripcion='$descripcion'
$fotoSQL
WHERE id=$idUsuario
";

$conexion->query($sqlActualizar);

// 🔥 ACTUALIZA LA SESIÓN AQUÍ
$_SESSION['nombre'] = $nombre;

header("Location: ../profile.php");
exit();
?>