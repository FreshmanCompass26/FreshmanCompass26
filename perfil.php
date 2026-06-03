<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

include 'php/conexion.php';

$idUsuario = $_SESSION['usuario_id'];

$sql = "SELECT * FROM estudiantes WHERE usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idUsuario);
$stmt->execute();

$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

if (!$usuario) {

    $usuario = [
        'nombre' => $_SESSION['nombre'] ?? '',
        'apellido' => '',
        'usuario' => '',
        'correo' => $_SESSION['email'] ?? '',
        'telefono' => $_SESSION['phone'] ?? '',
        'fecha_nacimiento' => '',
        'centro_educativo' => '',
        'grado' => '',
        'biografia' => '',
        'foto_perfil' => 'default.png'
    ];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Mi Perfil</title>

<link rel="stylesheet" href="styles/perfil.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<?php include 'php/navbar.php'; ?>

<div class="perfil-container">


    <div class="perfil-card">

        <div class="foto-container">

            <img
            id="previewImage"
            class="foto-perfil"
            src="uploads/perfiles/<?php echo htmlspecialchars($usuario['foto_perfil']); ?>">

            <form
            action="php/subir_foto.php"
            method="POST"
            enctype="multipart/form-data">

                <label for="foto" class="btn-foto">
                    <i class="fas fa-camera"></i>
                </label>

                <input
                type="file"
                id="foto"
                name="foto"
                accept="image/*"
                hidden>

            </form>

        </div>

        <h2>
            <?php echo htmlspecialchars($usuario['nombre']); ?>
            <?php echo " "; ?>
            <?php echo htmlspecialchars($usuario['apellido']); ?>
        </h2>

        <span class="badge">
            Estudiante
        </span>

        <p class="bio">
            <?php echo htmlspecialchars($usuario['biografia']); ?>
        </p>

        <div class="info">

            <p>
                <i class="fas fa-envelope"></i>
                <?php echo htmlspecialchars($usuario['correo']); ?>
            </p>

            <p>
                <i class="fas fa-phone"></i>
                <?php echo htmlspecialchars($usuario['telefono']); ?>
            </p>

        </div>

    </div>


    <div class="editar-card">

        <h1>Editar Perfil</h1>

        <form action="php/actualizarPerfil.php" method="POST">

            <div class="grid">

                <div class="input-group">
                    <label>Nombre</label>

                    <input
                    type="text"
                    name="nombre"
                    value="<?php echo htmlspecialchars($usuario['nombre']); ?>">
                </div>

                <div class="input-group">
                    <label>Apellido</label>

                    <input
                    type="text"
                    name="apellido"
                    value="<?php echo htmlspecialchars($usuario['apellido']); ?>">
                </div>

                <div class="input-group">
                    <label>Usuario</label>

                    <input
                    type="text"
                    name="usuario"
                    value="<?php echo htmlspecialchars($usuario['usuario']); ?>">
                </div>

                <div class="input-group">
                    <label>Correo</label>

                    <input
                    type="email"
                    name="correo"
                    value="<?php echo htmlspecialchars($usuario['correo']); ?>">
                </div>

                <div class="input-group">
                    <label>Teléfono</label>

                    <input
                    type="text"
                    name="telefono"
                    value="<?php echo htmlspecialchars($usuario['telefono']); ?>">
                </div>

                <div class="input-group">
                    <label>Fecha de nacimiento</label>

                    <input
                    type="date"
                    name="fecha_nacimiento"
                    value="<?php echo $usuario['fecha_nacimiento']; ?>">
                </div>

            </div>

            <div class="input-group full">

                <label>Centro Educativo</label>

                <input
                type="text"
                name="centro_educativo"
                value="<?php echo htmlspecialchars($usuario['centro_educativo']); ?>">

            </div>

            <div class="grid">

                <div class="input-group">
                    <label>Grado</label>

                    <input
                    type="text"
                    name="grado"
                    value="<?php echo htmlspecialchars($usuario['grado']); ?>">
                </div>

                <div class="input-group">
                    <label>Especialidad</label>

                    <input
                    type="text"
                    name="especialidad"
                    value="<?php echo htmlspecialchars($usuario['especialidad']); ?>">
                </div>

            </div>

            <div class="input-group full">

                <label>Biografía</label>

                <textarea name="biografia"><?php
                echo htmlspecialchars($usuario['biografia']);
                ?></textarea>

            </div>

            <div class="acciones">

                <button type="submit" class="btn-guardar">
                    Guardar Cambios
                </button>

            </div>

        </form>

    </div>

</div>

<script>

document.getElementById('foto').addEventListener('change', function(e){

    const archivo = e.target.files[0];

    if(!archivo) return;

    const reader = new FileReader();

    reader.onload = function(event){

        document.getElementById('previewImage').src =
        event.target.result;

    };

    reader.readAsDataURL(archivo);

    this.form.submit();

});

</script>

</body>
</html>