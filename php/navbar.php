<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$pagina_actual = basename($_SERVER['PHP_SELF'], ".php");

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
                <a href="teachers.php">
                    <i class="fa-solid fa-user-group"></i>
                    <span>Teachers</span>
                </a>
            </li>

            <li class="<?= ($pagina_actual == 'consejos') ? 'active' : '' ?>">
                <a href="consejos.php">
                    <i class="fa-solid fa-lightbulb"></i>
                    <span>Consejos</span>
                </a>
            </li>
            <li class="<?= ($pagina_actual == 'actividades') ? 'active' : '' ?>">
                <a href="actividades.php">
                    <i class="fa-solid fa-puzzle-piece"></i>
                    <span>Actividades</span>
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

    <?php if (isset($_SESSION['nombre'])): ?>

        <?php
            $nombre  = $_SESSION['nombre'];
            $inicial = strtoupper(substr($nombre, 0, 1));
        ?>

    <?php else: ?>


    <?php endif; ?>

    <!-- Contenedor dinámico -->
    <div class="quote">
        <p id="texto-frase">Cargando frase...</p>
        <small id="autor-frase"></small>
    </div>

</div>

<script src="js/navbar.js"></script>