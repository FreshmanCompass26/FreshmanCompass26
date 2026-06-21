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
                <a href="/freshmancompass26/php/teachers.php">
                <i class="fa-solid fa-user-group"></i>
                <span>Teachers</span>



<li class="<?= ($pagina_actual == 'teachers') ? 'active' : '' ?>">
    <a href="php/teachers.php">
        <i class="fa-solid fa-user-group"></i>
        <span>Teachers</span>
    </a>
</li>

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
