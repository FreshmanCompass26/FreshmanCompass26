<?php

session_start();
include 'conexion.php';

$idUsuario = $_SESSION['usuario_id'];

$sql = "UPDATE estudiantes SET

nombre=?,
apellido=?,
usuario=?,
correo=?,
telefono=?,
fecha_nacimiento=?,
centro_educativo=?,
grado=?,
especialidad=?,
biografia=?

WHERE usuario_id=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
"ssssssssssi",

$_POST['nombre'],
$_POST['apellido'],
$_POST['usuario'],
$_POST['correo'],
$_POST['telefono'],
$_POST['fecha_nacimiento'],
$_POST['centro_educativo'],
$_POST['grado'],
$_POST['biografia'],
$idUsuario

);

$stmt->execute();

header("Location: perfil.php?success=1");
exit();