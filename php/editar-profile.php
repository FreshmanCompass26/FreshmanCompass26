<?php
session_start();
include("profile_conexion.php");

// 🔥 PROTECCIÓN
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.html");
    exit();
}

$idUsuario = $_SESSION['usuario_id'];

$consulta = $conexion->query("
SELECT * FROM usuarios WHERE usuario_ID = $idUsuario
");

$perfil = $consulta->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../styles/editar-profile.css">
<meta charset="UTF-8">
<title>Editar Perfil</title>


</head>
<body>

<div class="contenedor">

    <!-- ✅ CARD IZQUIERDA -->
    <div class="card-foto">

        <img src="../img/<?php echo $perfil['foto_perfil']; ?>" alt="">

        <h3><?php echo $perfil['nombre']; ?></h3>

        <p><?php echo $perfil['descripcion']; ?></p>

    </div>

    <!-- ✅ CARD DERECHA -->
    <div class="card-form">

        <form action="actualizarprofile.php" method="POST" enctype="multipart/form-data">

            <div class="campo">
                <label>Nombre</label>
                <input type="text" name="nombre" value="<?php echo $perfil['nombre']; ?>">
            </div>

            <div class="campo">
                <label>Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" value="<?php echo $perfil['fecha_nacimiento']; ?>">
            </div>

            <div class="campo">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $perfil['email']; ?>">
            </div>

            <div class="campo">
                <label>Descripción</label>
                <input type="text" name="descripcion" value="<?php echo $perfil['descripcion']; ?>">
            </div>

            <div class="campo">
                <label>Centro Escolar</label>
                <input type="text" name="centro_escolar" value="<?php echo $perfil['centro_escolar']; ?>">
            </div>

            <div class="campo">
                <label>Usuario</label>
                <input type="text" name="username" value="<?php echo $perfil['username']; ?>">
            </div>

            <div class="campo">
                <label>Foto</label>
                <input type="file" name="foto">
            </div>

            <button class="guardar">Guardar</button>

        </form>

    </div>

</div>

</body>
</html>