<?php
include("conexion.php");


// Obtener todos los maestros
$sql = "SELECT * FROM teachers ORDER BY
CASE
    WHEN materia = 'English' THEN 1
    WHEN materia = 'Computing' THEN 2
    WHEN materia = 'Values' THEN 3
    ELSE 4
END,
nombre ASC";

$result = $conn->query($sql);

if (!$result) {
    die("Error al obtener los profesores: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Teachers | Freshman Compass</title>

    <link rel="stylesheet" href="../styles/teachers.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>
<?php include("navbar.php"); ?>
<section class="teachers-section">

    <!-- Hero -->

    <div class="teachers-header">

        
    

        <h1>
            Conoce nuestros maestros
        </h1>

        <p>
           Nuestros profesores están aquí para guiarte, inspirarte y ayudarte a alcanzar tus metas
        </p>

    </div>

    <!-- Buscador -->

    <div class="teachers-tools">

        <div class="search-box">

            <i class="fa-solid fa-magnifying-glass"></i>

            <input
                type="text"
                id="searchTeacher"
                placeholder="Search teacher...">

        </div>

    </div>

    <!-- Filtros -->

    <div class="filters">

        <button class="filter-btn active" data-filter="all">
            All
        </button>

        <button class="filter-btn" data-filter="English">
            English
        </button>

        <button class="filter-btn" data-filter="Computing">
            Computing
        </button>

        <button class="filter-btn" data-filter="Values">
            Values
        </button>

        <button class="filter-btn" data-filter="Administration">
            Administration
        </button>

    </div>

    <!-- Tarjetas -->

    <div class="teachers-grid">
<?php while($teacher = $result->fetch_assoc()) : ?>

<?php

$materia = $teacher['materia'];

if(
    $materia != "English" &&
    $materia != "Computing" &&
    $materia != "Values"
){
    $categoria = "Administration";
}else{
    $categoria = $materia;
}

?>

<article
class="teacher-card"
data-category="<?= $categoria ?>"
data-name="<?= strtolower($teacher['nombre']) ?>">

    <div class="teacher-top">

        <div class="teacher-image">

            <img
    src="../img/teachers/<?= htmlspecialchars($teacher['imagen']); ?>"
    alt="<?= htmlspecialchars($teacher['nombre']); ?>">

        </div>

        <div class="teacher-info">

            <span class="badge">
                <?= htmlspecialchars($teacher['materia']); ?>
            </span>

            <h2>
                <?= htmlspecialchars($teacher['nombre']); ?>
            </h2>

            <div class="teacher-email">

                <i class="fa-solid fa-envelope"></i>

                <span>
                    <?= htmlspecialchars($teacher['correo']); ?>
                </span>

            </div>

        </div>

    </div>

    <div class="teacher-data">

        <div class="data-box">

            <i class="fa-regular fa-calendar"></i>

            <div class="data-title">
                Schedule
            </div>

            <div class="data-value">

                <?= htmlspecialchars($teacher['dias']); ?><br>

                <?= htmlspecialchars($teacher['horario']); ?>

            </div>

        </div>

        <div class="data-box">

            <i class="fa-solid fa-cake-candles"></i>

            <div class="data-title">
                Birthday
            </div>

            <div class="data-value">

                <?= htmlspecialchars($teacher['cumple']); ?>

            </div>

        </div>

    </div>

    <div class="teacher-quote">

        "<?= htmlspecialchars($teacher['frase']); ?>"

    </div>

    <div class="teacher-footer">

        <span class="teacher-subject">

            <?= htmlspecialchars($teacher['materia']); ?>

        </span>

        <button
    class="profile-btn"

    data-name="<?= htmlspecialchars($teacher['nombre']); ?>"

    data-subject="<?= htmlspecialchars($teacher['materia']); ?>"

    data-email="<?= htmlspecialchars($teacher['correo']); ?>"

    data-schedule="<?= htmlspecialchars($teacher['dias'] . ' | ' . $teacher['horario']); ?>"

    data-birthday="<?= htmlspecialchars($teacher['cumple']); ?>"

    data-quote="<?= htmlspecialchars($teacher['frase']); ?>"

    data-image="../img/teachers/<?= htmlspecialchars($teacher['imagen']); ?>">

    View Profile

</button>

    </div>

</article>

<?php endwhile; ?>

    </div>

</section>
<!-- Modal del profesor -->

<div id="teacherModal" class="modal">

    <div class="modal-content">

        <span class="close-modal">&times;</span>

        <img id="modalImage" alt="Teacher">

        <h2 id="modalName"></h2>

        <span id="modalSubject"></span>

        <p id="modalEmail"></p>

        <p id="modalSchedule"></p>

        <p id="modalBirthday"></p>

        <blockquote id="modalQuote"></blockquote>

        <div class="modal-actions">

            <a id="emailButton" class="modal-btn">

                <i class="fa-solid fa-envelope"></i>

                Send Email

            </a>

            <button id="copyEmail" class="modal-btn" type="button">

                <i class="fa-regular fa-copy"></i>

                Copy Email

            </button>

            <button id="closeButton" class="modal-btn" type="button">

                <i class="fa-solid fa-xmark"></i>

                Close

            </button>

        </div>

    </div>

</div>
<!-- Toast -->

<div id="toast" class="toast">

    <i class="fa-solid fa-circle-check"></i>

    <span id="toastMessage">

        Email copied successfully!

    </span>

</div>
<?php include 'footer.php'; ?>

<script src="../Js/teachers.js"></script>

</body>
</html>