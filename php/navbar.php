<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

/* 📌 Detecta página actual automáticamente */
$pagina_actual = basename($_SERVER['PHP_SELF'], ".php");

/* 📌 Ajustes para que coincida con tus nombres */
if ($pagina_actual == "index") {
    $pagina_actual = "inicio";
}

if ($pagina_actual == "nuestro_centro") {
    $pagina_actual = "centro";
}
?>

<div class="sidebar">

    <div class="logo">
        <img src="/freshmancompass26/img/logoooooo.png" alt="Logo">
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
                <a href="/freshmancompass26/php/teachers.php">
                    <i class="fa-solid fa-user-group"></i>
                    <span>Teachers</span>
                </a>
            </li>

            <li class="<?= ($pagina_actual == 'consejos') ? 'active' : '' ?>">
                <a href="/freshmancompass26/php/consejos.php">
                    <i class="fa-solid fa-lightbulb"></i>
                    <span>Consejos</span>
                </a>
            </li>

            <li class="<?= ($pagina_actual == 'psicologas') ? 'active' : '' ?>">
                <a href="../psicologas.php">
                    <i class="fa-solid fa-heart"></i>
                    <span>Psicólogas</span>
                </a>
            </li>

            <li class="<?= ($pagina_actual == 'centro') ? 'active' : '' ?>">
                <a href="nuestro_centro.php">
                    <i class="fa-solid fa-school"></i>
                    <span>Nuestro centro</span>
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

        <?php if ($pagina_actual == "inicio") { ?>

            <p>Cada nuevo comienzo trae nuevas oportunidades.</p>
            <small>Freshman Compass</small>

        <?php } elseif ($pagina_actual == "teachers") { ?>

            <p>Un buen maestro puede cambiar una vida.</p>
            <small>Anónimo</small>

        <?php } elseif ($pagina_actual == "consejos") { ?>

            <p>Los pequeños hábitos crean grandes resultados.</p>
            <small>James Clear</small>

        <?php } elseif ($pagina_actual == "psicologas") { ?>

            <p>Pedir ayuda también es una muestra de fortaleza.</p>
            <small>Anónimo</small>

        <?php } elseif ($pagina_actual == "eventos") { ?>

            <p>Cada experiencia es una oportunidad para crecer.</p>
            <small>Freshman Compass</small>

        <?php } elseif ($pagina_actual == "centro") { ?>

            <p>Tu escuela también es parte de tu historia.</p>
            <small>Freshman Compass</small>

        <?php } ?>

    </div>

</div>

<script src="../Js/navbar.js"></script>