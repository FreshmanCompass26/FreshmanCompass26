<?php

include("profile_conexion.php");

$idUsuario = 3;

$nombre = $_POST['nombre'];
$fechaNacimiento = $_POST['fecha_nacimiento'];
$email = $_POST['email'];
$centroEscolar = $_POST['centro_escolar'];
$username = $_POST['username'];

$sqlActualizar = "
UPDATE estudiantes
SET
nombre='$nombre',
fecha_nacimiento='$fechaNacimiento',
email='$email',
centro_escolar='$centroEscolar',
username='$username'
WHERE id=$idUsuario
";

$conexion->query($sqlActualizar);

header("Location: profile.php");
exit();
?>