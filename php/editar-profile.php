<?php
include("profile_conexion.php");

$idUsuario = 3;

$consulta = $conexion->query("SELECT * FROM estudiantes WHERE id = $idUsuario");
$perfil = $consulta->fetch_assoc();

if (!$perfil) {
    $perfil = [
        "nombre" => "",
        "descripcion" => "",
        "email" => "",
        "centro_escolar" => "",
        "username" => "",
        "fecha_nacimiento" => "",
        "foto_perfil" => "default.png"
    ];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Perfil</title>

<link rel="stylesheet" href="styles/editar-profile.css">
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="styles/navbar.css">
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

    <h1>Editar Perfil</h1>

    <div class="contenedor-principal">

        <!-- TARJETA -->
        <div class="tarjeta-perfil">
            <img src="img/<?php echo $perfil['foto_perfil']; ?>">
            <h2><?php echo $perfil['nombre']; ?></h2>
        </div>

        <!-- FORM -->
        <div class="datos">

            <form action="php/actualizar_perfil.php" method="POST">

                <div class="campo">
                    <label>Nombre</label>
                    <input type="text" name="nombre"
                    value="<?php echo $perfil['nombre']; ?>">
                </div>

                <div class="campo">
                    <label>Fecha</label>
                    <input type="date" name="fecha_nacimiento"
                    value="<?php echo $perfil['fecha_nacimiento']; ?>">
                </div>

                <div class="campo">
                    <label>Email</label>
                    <input type="email" name="email"
                    value="<?php echo $perfil['email']; ?>">
                </div>

                <div class="campo">
                    <label>Centro</label>
                    <input type="text" name="centro_escolar"
                    value="<?php echo $perfil['centro_escolar']; ?>">
                </div>

                <div class="campo">
                    <label>Usuario</label>
                    <input type="text" name="username"
                    value="<?php echo $perfil['username']; ?>">
                </div>

                <div class="campo">
                    <label>Descripción</label>
                    <input type="text" name="descripcion"
                    value="<?php echo $perfil['descripcion']; ?>">
                </div>

                <button type="submit">Guardar Cambios</button>

            </form>

        </div>

    </div>

</main>

</body>
</html>
