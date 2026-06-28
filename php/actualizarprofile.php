<?php

include("profile_conexion.php");

session_start();

// 🔥 PROTECCIÓN
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.html");
    exit();
}

// ✅ USAR EL USUARIO REAL
$idUsuario = $_SESSION['usuario_id'];

// 📥 DATOS DEL FORM
$nombre = $_POST['nombre'];
$fechaNacimiento = $_POST['fecha_nacimiento'];
$email = $_POST['email'];
$centroEscolar = $_POST['centro_escolar'];
$username = $_POST['username'];
$descripcion = $_POST['descripcion'];

// 🖼 FOTO
$fotoNombre = $_FILES['foto']['name'];

if($fotoNombre != ""){
    $rutaTemp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($rutaTemp, __DIR__ . "/../img/" . $fotoNombre);

    $fotoSQL = ", foto_perfil='$fotoNombre'";
} else {
    $fotoSQL = "";
}

// ✅ QUERY CORRECTA
$sqlActualizar = "
UPDATE usuarios
SET
nombre='$nombre',
fecha_nacimiento='$fechaNacimiento',
email='$email',
centro_escolar='$centroEscolar',
username='$username',
descripcion='$descripcion'
$fotoSQL
WHERE usuario_ID=$idUsuario
";

// ✅ Ejecutar
$conexion->query($sqlActualizar);

// ✅ ACTUALIZAR SESIÓN
$_SESSION['nombre'] = $nombre;
$_SESSION['email'] = $email;

// ✅ Volver al perfil
header("Location: ../profile.php");
exit();
?>