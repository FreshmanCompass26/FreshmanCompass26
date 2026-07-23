<?php
include 'php/conexion.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: salones.php");
    exit();
}

$id = intval($_GET['id']);

$stmt = $conn->prepare("SELECT * FROM info_classrooms WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$classroom = $stmt->get_result()->fetch_assoc();

if (!$classroom) {
    die("Classroom no encontrado.");
}

$stmtActividades = $conn->prepare("SELECT * FROM actividades_classrooms WHERE classroom_id = ?");
$stmtActividades->bind_param("i", $id);
$stmtActividades->execute();
$actividades = $stmtActividades->get_result();

$stmtNormas = $conn->prepare("SELECT * FROM normas_classrooms WHERE classroom_id = ?");
$stmtNormas->bind_param("i", $id);
$stmtNormas->execute();
$normas = $stmtNormas->get_result();

$stmtRecursos = $conn->prepare("SELECT * FROM recursos_classrooms WHERE classroom_id = ?");
$stmtRecursos->bind_param("i", $id);
$stmtRecursos->execute();
$recursos = $stmtRecursos->get_result();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo htmlspecialchars($classroom['nombre']); ?> | Freshman Compass</title>

    <link rel="stylesheet" href="styles/detalle_classroom.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<main>

<section class="hero">

    <img
        src="uploads/banners/<?php echo htmlspecialchars($classroom['banner']); ?>"
        alt="<?php echo htmlspecialchars($classroom['nombre']); ?>"
        class="hero-banner"
    >

    <div class="hero-overlay"></div>

    <div class="hero-content">

        <span class="hero-category">

            <i class="fa-solid fa-graduation-cap"></i>

            <?php echo htmlspecialchars($classroom['categoria']); ?>

        </span>

        <h1>

            <?php echo htmlspecialchars($classroom['nombre']); ?>

        </h1>

        <p>

            <?php echo nl2br(htmlspecialchars($classroom['descripcion_corta'])); ?>

        </p>

        <a href="salones.php" class="btn-volver">

            <i class="fa-solid fa-arrow-left"></i>

            Volver a Classrooms

        </a>

    </div>

</section>

<section class="descripcion">

    <div class="contenedor">

        <div class="descripcion-header">

            <h2>

                Acerca de este Classroom

            </h2>

            <div class="linea"></div>

        </div>

        <div class="descripcion-contenido">

            <p>

                <?php echo nl2br(htmlspecialchars($classroom['descripcion_larga'])); ?>

            </p>

        </div>

    </div>

</section>
<section class="video-classroom">

    <div class="contenedor">

        <div class="section-title">

            <h2>
                <i class="fa-solid fa-circle-play"></i>
                Conoce el Classroom
            </h2>

            <div class="linea"></div>

        </div>

        <div class="video-card">

            <!-- ========================================================= -->
            <!-- AQUÍ SE SUSTITUYE LA URL DEL VIDEO DESDE LA BASE DE DATOS -->
            <!-- Asegúrate de guardar en la BD la URL en formato embebido: -->
            <!-- Ejemplo: https://www.youtube.com/embed/TU_ID_DE_VIDEO      -->
            <!-- ========================================================= -->
            <iframe 
                width="100%" 
                height="450" 
                src="<?php echo htmlspecialchars($classroom['video']); ?>" 
                title="Video del classroom" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                allowfullscreen>
            </iframe>

        </div>

    </div>

</section>



<section class="info-grid">

    <div class="contenedor">

        <div class="card-info">

            <div class="card-header">

                <i class="fa-solid fa-lightbulb"></i>

                <h2>¿Qué se hace aquí?</h2>

            </div>

            <ul class="lista">

                <?php while($actividad = $actividades->fetch_assoc()) { ?>

                    <li>

                        <i class="fa-solid fa-check"></i>

                        <?php echo htmlspecialchars($actividad['descripcion']); ?>

                    </li>

                <?php } ?>

            </ul>

        </div>



        <div class="card-info">

            <div class="card-header">

                <i class="fa-solid fa-book-open"></i>

                <h2>Normas del salón</h2>

            </div>

            <ul class="lista">

                <?php while($norma = $normas->fetch_assoc()) { ?>

                    <li>

                        <i class="fa-solid fa-check"></i>

                        <?php echo htmlspecialchars($norma['descripcion']); ?>

                    </li>

                <?php } ?>

            </ul>

        </div>

    </div>

</section>
<section class="recursos-section">

    <div class="contenedor">

        <div class="section-title">

            <h2>

                <i class="fa-solid fa-folder-open"></i>

                Recursos disponibles

            </h2>

            <div class="linea"></div>

        </div>

        <div class="recursos-grid">

            <?php while($recurso = $recursos->fetch_assoc()) { ?>

                <a href="<?php echo htmlspecialchars($recurso['enlace']); ?>" class="recurso-card" target="_blank">

                    <div class="recurso-icon">

                        <i class="fa-solid <?php echo htmlspecialchars($recurso['icono']); ?>"></i>

                    </div>

                    <div class="recurso-info">

                        <h3>

                            <?php echo htmlspecialchars($recurso['nombre']); ?>

                        </h3>

                        <span>

                            Ver recurso

                            <i class="fa-solid fa-arrow-right"></i>

                        </span>

                    </div>

                </a>

            <?php } ?>

        </div>

    </div>

</section>

<section class="volver-section">

    <a href="salones.php" class="btn-regresar">

        <i class="fa-solid fa-arrow-left"></i>

        Regresar a Classrooms

    </a>

</section>

</main>

<script src="js/detalle_classroom.js"></script>

</body>

</html>

<?php

$stmt->close();
$stmtActividades->close();
$stmtNormas->close();
$stmtRecursos->close();

$conn->close();

?>