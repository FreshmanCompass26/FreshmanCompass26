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

$logueado = isset($_SESSION['nombre']);

// Si no está logueado, todos los links van a login.php
$link_teachers   = $logueado ? "teachers.php"       : "login.php";
$link_consejos   = $logueado ? "consejos.php"       : "login.php";
$link_actividades = $logueado ? "actividades.php"   : "login.php";
$link_centro     = $logueado ? "nuestro_centro.php" : "login.php";
$link_eventos    = $logueado ? "eventos.php"        : "login.php";
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

        <li class="<?= ($pagina_actual == 'teachers') ? 'active' : '' ?>">
            <a href="<?= $link_teachers ?>">
                <i class="fa-solid fa-user-group"></i>
                <span>Teachers</span>
            </a>
        </li>

        <li class="<?= ($pagina_actual == 'consejos') ? 'active' : '' ?>">
            <a href="<?= $link_consejos ?>">
                <i class="fa-solid fa-lightbulb"></i>
                <span>Consejos</span>
            </a>
        </li>

        <li class="<?= ($pagina_actual == 'actividades') ? 'active' : '' ?>">
            <a href="<?= $link_actividades ?>">
                <i class="fa-solid fa-puzzle-piece"></i>
                <span>Actividades</span>
            </a>
        </li>

        <li class="<?= ($pagina_actual == 'centro') ? 'active' : '' ?>">
            <a href="<?= $link_centro ?>">
                <i class="fa-solid fa-school"></i>
                <span>Nuestro centro</span>
            </a>
        </li>

        <li class="<?= ($pagina_actual == 'eventos' || $pagina_actual == 'mas-eventos') ? 'active' : '' ?>">
            <a href="<?= $link_eventos ?>">
                <i class="fa-solid fa-calendar-days"></i>
                <span>Eventos</span>
            </a>
        </li>

        

    </ul>

    <!-- Contenedor dinámico -->
    <div class="quote">
        <p id="texto-frase">Cargando frase...</p>
        <small id="autor-frase"></small>
    </div>

</div>

<!-- NAVBAR MÓVIL -->
<div class="mobile-navbar">

    <a href="index.php" class="<?= ($pagina_actual == 'inicio') ? 'active' : '' ?>">
        <i class="fa-solid fa-house"></i>
        <span>Inicio</span>
    </a>

    <a href="<?= $link_teachers ?>" class="<?= ($pagina_actual == 'teachers') ? 'active' : '' ?>">
        <i class="fa-solid fa-user-group"></i>
        <span>Teachers</span>
    </a>

    <a href="<?= $link_consejos ?>" class="<?= ($pagina_actual == 'consejos') ? 'active' : '' ?>">
        <i class="fa-solid fa-lightbulb"></i>
        <span>Consejos</span>
    </a>

    <a href="<?= $link_actividades ?>" class="<?= ($pagina_actual == 'actividades') ? 'active' : '' ?>">
        <i class="fa-solid fa-puzzle-piece"></i>
        <span>Actividades</span>
    </a>

    <a href="<?= $link_centro ?>" class="<?= ($pagina_actual == 'centro') ? 'active' : '' ?>">
        <i class="fa-solid fa-school"></i>
        <span>Centro</span>
    </a>

    <a href="<?= $link_evento ?>" class="<?= ($pagina_actual == 'eventos' ) ? 'active' : '' ?>">
        <i class="fa-solid fa-calendar-days"></i>
        <span>Eventos</span>
    </a>

    <a href="<?= $link_eventos ?>" class="<?= ($pagina_actual == 'mas-eventos' ) ? 'active' : '' ?>">
        <i class="fa-solid fa-calendar-days"></i>
        <span>Eventos</span>
    </a>

</div>

<script src="js/navbar.js"></script>