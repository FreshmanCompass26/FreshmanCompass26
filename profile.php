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

            <?php
                $nombrePerfil = $perfil['nombre'] ?? 'Usuario';
                $inicialPerfil = strtoupper(substr($nombrePerfil, 0, 1));
                $fotoPerfil = 'img/' . ($perfil['foto_perfil'] ?? 'default.png');
            ?>
            <div class="avatar-placeholder" data-inicial="<?php echo $inicialPerfil; ?>">
                <img src="<?php echo $fotoPerfil; ?>" alt="Foto de perfil"
                     onerror="this.style.display='none'; this.parentElement.classList.add('sin-foto');">
            </div>

            <h2>
                <?php echo $nombrePerfil; ?>
            </h2>

            <p>
                <?php echo $perfil['descripcion'] ?? 'Sin descripción'; ?>
            </p>

        </div>

        <!-- DATOS SOLO LECTURA -->
        <div class="datos">

            <div class="campo">
                <label><i class="fa-solid fa-user"></i> Nombre</label>
                <p><?php echo $perfil['nombre'] ?? ''; ?></p>
            </div>

            <div class="campo">
                <label><i class="fa-solid fa-cake-candles"></i> Fecha de nacimiento</label>
                <p><?php echo $perfil['fecha_nacimiento'] ?? ''; ?></p>
            </div>

            <div class="campo">
                <label><i class="fa-solid fa-envelope"></i> Email</label>
                <p><?php echo $perfil['email'] ?? ''; ?></p>
            </div>

            <div class="campo">
                <label><i class="fa-solid fa-school"></i> Centro Escolar</label>
                <p><?php echo $perfil['centro_escolar'] ?? ''; ?></p>
            </div>

            <div class="campo">
                <label><i class="fa-solid fa-at"></i> Usuario</label>
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