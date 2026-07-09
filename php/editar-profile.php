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

$nombrePerfil = $perfil['nombre'] ?? 'Usuario';
$inicialPerfil = strtoupper(substr($nombrePerfil, 0, 1));
$fotoPerfil = !empty($perfil['foto_perfil']) ? '../img/' . $perfil['foto_perfil'] : '';
$rolPerfil = $perfil['rol'] ?? 'Estudiante';
$citaPerfil = !empty($perfil['descripcion']) ? $perfil['descripcion'] : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../styles/editar-profile.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

<a href="javascript:history.back()" class="btn-back">
    <i class="fa-solid fa-arrow-left"></i>
</a>

<div class="contenedor">

    <!-- ✅ CARD IZQUIERDA -->
    <div class="card-foto">

        <div class="icono-flotante"><i class="fa-solid fa-compass"></i></div>

        <div class="avatar-placeholder" data-inicial="<?php echo $inicialPerfil; ?>">
            <img src="<?php echo $fotoPerfil; ?>" alt="Foto de perfil"
                 onerror="this.style.display='none'; this.parentElement.classList.add('sin-foto');">
        </div>

        <h3><?php echo $nombrePerfil; ?></h3>
        <p class="rol"><?php echo $rolPerfil; ?></p>

        <div class="separador"></div>

        <p class="cita">"<?php echo $citaPerfil; ?>"</p>

        <div class="sello">
            <i class="fa-solid fa-graduation-cap"></i>
            <span>Cada paso que das hoy te acerca a tus metas.</span>
        </div>

    </div>

    <!-- ✅ CARD DERECHA -->
    <div class="card-form">

        <div class="form-header">
            <span class="titulo-editar">EDITA TU PERFIL</span>
            <div class="icono-editar"><i class="fa-solid fa-pen"></i></div>
        </div>

        <form action="actualizarprofile.php" method="POST" enctype="multipart/form-data">

            <div class="campo">
                <div class="icono-campo"><i class="fa-solid fa-user"></i></div>
                <div class="campo-contenido">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $perfil['nombre'] ?? ''; ?>">
                </div>
            </div>

            <div class="campo">
                <div class="icono-campo"><i class="fa-solid fa-cake-candles"></i></div>
                <div class="campo-contenido">
                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $perfil['fecha_nacimiento'] ?? ''; ?>">
                </div>
            </div>

            <div class="campo">
                <div class="icono-campo"><i class="fa-solid fa-envelope"></i></div>
                <div class="campo-contenido">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo $perfil['email'] ?? ''; ?>">
                </div>
            </div>

            <div class="campo">
                <div class="icono-campo"><i class="fa-solid fa-comment"></i></div>
                <div class="campo-contenido">
                    <label for="descripcion">Descripción</label>
                    <input type="text" id="descripcion" name="descripcion" placeholder="Escribe algo sobre ti..." value="<?php echo $perfil['descripcion'] ?? ''; ?>">
                </div>
            </div>

            <div class="campo">
                <div class="icono-campo"><i class="fa-solid fa-school"></i></div>
                <div class="campo-contenido">
                    <label for="centro_escolar">Centro Escolar</label>
                    <input type="text" id="centro_escolar" name="centro_escolar" placeholder="Ingresa tu centro escolar" value="<?php echo $perfil['centro_escolar'] ?? ''; ?>">
                </div>
            </div>

            <div class="campo">
                <div class="icono-campo"><i class="fa-solid fa-at"></i></div>
                <div class="campo-contenido">
                    <label for="username">Usuario</label>
                    <input type="text" id="username" name="username" placeholder="Ingresa tu usuario" value="<?php echo $perfil['username'] ?? ''; ?>">
                </div>
            </div>

            <div class="campo">
                <div class="icono-campo"><i class="fa-solid fa-image"></i></div>
                <div class="campo-contenido">
                    <label for="foto">Foto</label>
                    <div class="campo-foto-input">
                        <label class="btn-archivo" for="foto">Elegir archivo</label>
                        <span class="nombre-archivo" id="nombre-archivo">No se ha seleccionado ningún archivo</span>
                        <input type="file" id="foto" name="foto">
                    </div>
                </div>
            </div>

            <div class="acciones">
                <button type="submit" class="guardar">Guardar cambios</button>
            </div>

        </form>

    </div>

</div>

<div class="mensaje-motivador">
    <div class="icono-circulo"><i class="fa-solid fa-star"></i></div>
    <span>¡Tú puedes lograr todo lo que te propongas! 💙</span>
    <div class="decoracion">
        <i class="fa-solid fa-flag"></i>
        <i class="fa-solid fa-mountain-sun"></i>
    </div>
</div>

<script>
document.getElementById('foto').addEventListener('change', function () {
    var nombre = this.files.length ? this.files[0].name : 'No se ha seleccionado ningún archivo';
    document.getElementById('nombre-archivo').textContent = nombre;
});
</script>

</body>
</html>