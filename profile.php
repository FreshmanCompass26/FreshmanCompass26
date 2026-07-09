<?php
session_start();
include("php/profile_conexion.php");

// 🔥 PROTECCIÓN
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
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

    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/profile.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<?php $pagina_actual = 'profile'; ?>
<?php include 'php/navbar.php'; ?>


<main class="contenido">

    <h1>Perfil de Estudiante</h1>

    <div class="contenedor-principal">

        <!-- TARJETA -->
        <div class="tarjeta-perfil">

            <div class="icono-flotante"><i class="fa-solid fa-compass"></i></div>

            <?php
                $nombrePerfil = $perfil['nombre'] ?? 'Usuario';
                $inicialPerfil = strtoupper(substr($nombrePerfil, 0, 1));
                $fotoPerfil = 'img/' . ($perfil['foto_perfil'] ?? 'default.png');
                $rolPerfil = $perfil['rol'] ?? 'Estudiante';
                $citaPerfil = $perfil['lema'] ?? 'Aprende hoy, lidera mañana.';
            ?>
            <div class="avatar-placeholder" data-inicial="<?php echo $inicialPerfil; ?>">
                <img src="<?php echo $fotoPerfil; ?>" alt="Foto de perfil"
                     onerror="this.style.display='none'; this.parentElement.classList.add('sin-foto');">
            </div>

            <h2><?php echo $nombrePerfil; ?></h2>
            <p class="rol"><?php echo $rolPerfil; ?></p>

            <div class="separador"></div>

            <p class="cita">"<?php echo $citaPerfil; ?>"</p>

            <div class="sello">
                <i class="fa-solid fa-graduation-cap"></i>
                <span>Sé parte de tu futuro, cada paso cuenta.</span>
            </div>

        </div>

        <!-- DATOS SOLO LECTURA -->
        <div class="datos">

            <div class="datos-titulo">
                <span>BITÁCORA DEL ESTUDIANTE</span>
                <i class="fa-solid fa-clipboard-list"></i>
            </div>

            <div class="campo">
                <div class="icono-campo"><i class="fa-solid fa-user"></i></div>
                <div class="campo-contenido">
                    <label>Nombre</label>
                    <p><?php echo $perfil['nombre'] ?? ''; ?></p>
                </div>
            </div>

            <div class="campo">
                <div class="icono-campo"><i class="fa-solid fa-cake-candles"></i></div>
                <div class="campo-contenido">
                    <label>Fecha de nacimiento</label>
                    <p><?php echo $perfil['fecha_nacimiento'] ?? ''; ?></p>
                </div>
            </div>

            <div class="campo">
                <div class="icono-campo"><i class="fa-solid fa-envelope"></i></div>
                <div class="campo-contenido">
                    <label>Email</label>
                    <p><?php echo $perfil['email'] ?? ''; ?></p>
                </div>
            </div>

            <div class="campo">
                <div class="icono-campo"><i class="fa-solid fa-school"></i></div>
                <div class="campo-contenido">
                    <label>Centro Escolar</label>
                    <p><?php echo $perfil['centro_escolar'] ?? ''; ?></p>
                </div>
            </div>

            <div class="campo">
                <div class="icono-campo"><i class="fa-solid fa-at"></i></div>
                <div class="campo-contenido">
                    <label>Usuario</label>
                    <p><?php echo $perfil['username'] ?? ''; ?></p>
                </div>
            </div>

            <div class="datos-acciones">
                <a href="php/editar-profile.php" class="btn-editar">
                    Editar mi perfil
                </a>
            </div>

        </div>

    </div>

    <div class="mensaje-motivador">
        <i class="fa-solid fa-star"></i>
        <span>Tú tienes el potencial para lograr grandes cosas. ¡Sigue adelante!</span>
        <div class="decoracion">
            <i class="fa-solid fa-flag"></i>
            <i class="fa-solid fa-mountain-sun"></i>
        </div>
    </div>

</main>

<script src="Js/perfil.js"></script>

</body>
</html>