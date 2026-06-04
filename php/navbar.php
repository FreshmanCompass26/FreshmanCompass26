<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="sidebar">

    <div class="logo">
        <img src="img/image.jpg" alt="Logo">
        <span>
            Freshman Compass
        </span>
    </div>

    <ul class="menu">

       
        <li class="active">
            <a href="index.php">
                <i class="fa-solid fa-house"></i>
                <span>Inicio</span>
            </a>
        </li>

    
        <?php if (isset($_SESSION['nombre'])) { ?>

        <li>
            <a href="#">
                <i class="fa-solid fa-user-group"></i>
                <span>Teachers</span>
            </a>
        </li>

        <li>
            <a href="nuestro_centro.php">
                <i class="fa-solid fa-school"></i>
                <span>Nuestro centro</span>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fa-solid fa-heart"></i>
                <span>Consejos</span>
            </a>
        </li>

        <li>
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
