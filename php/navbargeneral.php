<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>


<link rel="stylesheet" href="/freshmancompass26/css/navbar.css">


<div class="sidebar">


    <div class="logo">

        <img src="/freshmancompass26/img/fc.logo.png" alt="Logo">

    </div>



    <ul class="menu">


        <li class="<?= ($pagina_actual == 'inicio') ? 'active' : '' ?>">

            <a href="/freshmancompass26/index.php">

                <i class="fa-solid fa-house"></i>

                <span>Inicio</span>

            </a>

        </li>



<?php if(isset($_SESSION['nombre'])) { ?>


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

            <a href="/freshmancompass26/php/psicologas.php">

                <i class="fa-solid fa-heart"></i>

                <span>Psicólogas</span>

            </a>

        </li>





        <li class="<?= ($pagina_actual == 'centro') ? 'active' : '' ?>">

            <a href="/freshmancompass26/php/nuestro_centro.php">

                <i class="fa-solid fa-school"></i>

                <span>Nuestro centro</span>

            </a>

        </li>





        <li class="<?= ($pagina_actual == 'eventos') ? 'active' : '' ?>">

            <a href="/freshmancompass26/php/eventos.php">

                <i class="fa-solid fa-calendar-days"></i>

                <span>Eventos</span>

            </a>

        </li>


<?php } ?>


    </ul>




    <div class="quote">


        <p>

        Don't count the days,<br>
        make the days count.

        </p>


        <small>

        — Muhammad Ali

        </small>


    </div>



</div>