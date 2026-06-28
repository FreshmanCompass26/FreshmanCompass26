<?php
session_start();
include("php/profile_conexion.php");

// 🔥 PROTECCIÓN
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Estudiante</title>

    <link rel="stylesheet" href="styles/profile.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="sidebar">

    <div class="logo">
        <img src="img/fc.logo.png" alt="Logo">
    </div>

    <ul class="menu">

        <li class="<?= ($pagina_actual == 'inicio') ? 'active' : '' ?>">
            <a href="index.php">
                <i class="fa-solid fa-house"></i>
                <span>Inicio</span>
            </a>
        </li>

        <?php if (isset($_SESSION['nombre'])) { ?>

        <li class="<?= ($pagina_actual == 'teachers') ? 'active' : '' ?>">
            <a href="teachers.php">
                <i class="fa-solid fa-user-group"></i>
                <span>Teachers</span>
            </a>
        </li>

        <li class="<?= ($pagina_actual == 'centro') ? 'active' : '' ?>">
            <a href="nuestro_centro.php">
                <i class="fa-solid fa-school"></i>
                <span>Nuestro centro</span>
            </a>
        </li>

        <li class="<?= ($pagina_actual == 'consejos') ? 'active' : '' ?>">
            <a href="#">
                <i class="fa-solid fa-heart"></i>
                <span>Consejos</span>
            </a>
        </li>

        <li class="<?= ($pagina_actual == 'eventos') ? 'active' : '' ?>">
            <a href="eventos.php">
                <i class="fa-solid fa-calendar-days"></i>
                <span>Eventos</span>
            </a>
        </li>

        <?php } ?>

    </ul>

    <div class="quote">
        <p>
            Don’t count the days,<br>
            make the days count.
        </p>
        <small>
            — Muhammad Ali
        </small>
    </div>

</div>


<main class="contenido">

    <h1>Perfil de Estudiante</h1>

    <div class="contenedor-principal">

        <!-- TARJETA -->
        <div class="tarjeta-perfil">

            <img src="img/<?php echo $perfil['foto_perfil'] ?? 'default.png'; ?>" alt="Foto Perfil">

            <h2>
                <?php echo $perfil['nombre'] ?? 'Usuario'; ?>
            </h2>

            <p>
                <?php echo $perfil['descripcion'] ?? 'Sin descripción'; ?>
            </p>

        </div>

        <!-- DATOS SOLO LECTURA -->
        <div class="datos">

            <div class="campo">
                <label>Nombre</label>
                <p><?php echo $perfil['nombre'] ?? ''; ?></p>
            </div>

            <div class="campo">
                <label>Fecha de nacimiento</label>
                <p><?php echo $perfil['fecha_nacimiento'] ?? ''; ?></p>
            </div>

            <div class="campo">
                <label>Email</label>
                <p><?php echo $perfil['email'] ?? ''; ?></p>
            </div>

            <div class="campo">
                <label>Centro Escolar</label>
                <p><?php echo $perfil['centro_escolar'] ?? ''; ?></p>
            </div>

            <div class="campo">
                <label>Usuario</label>
                <p><?php echo $perfil['username'] ?? ''; ?></p>
            </div>

        
            <a href="php/editar-profile.php" class="btn-editar">
                Edita tu profile
            </a>

        </div>

    </div>

</main>

<script src="Js/perfil.js"></script>

</body>
</html>