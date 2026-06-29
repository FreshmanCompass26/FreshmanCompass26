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
                <a href="/freshmancompass26/psicologas.php">
                    <i class="fa-solid fa-heart"></i>
                    <span>Psicólogas</span>
                </a>
            </li>

            <li class="<?= ($pagina_actual == 'centro') ? 'active' : '' ?>">
                <a href="/freshmancompass26/nuestro_centro.php">
                    <i class="fa-solid fa-school"></i>
                    <span>Nuestro centro</span>
                </a>
            </li>

            <li class="<?= ($pagina_actual == 'eventos') ? 'active' : '' ?>">
                <a href="/freshmancompass26/eventos.php">
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

        <div class="sidebar-user">
            <div class="dropdown user-dropdown">

                <div class="user-trigger" data-bs-toggle="dropdown">
                    <div class="avatar"><?= $inicial ?></div>
                    <span class="username"><?= $nombre ?></span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>

                <ul class="dropdown-menu custom-dropdown">

                    <li class="dropdown-header-user">
                        <div class="avatar-lg"><?= $inicial ?></div>
                        <div>
                            <div class="name"><?= $nombre ?></div>
                            <div class="sub">Bienvenido</div>
                        </div>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <a class="dropdown-item" href="profile.php">
                            <i class="fa-regular fa-user"></i> Perfil
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fa-solid fa-gear"></i> Configuración
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item logout" href="php/logout.php">
                            <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión
                        </a>
                    </li>

                </ul>
            </div>
        </div>

    <?php else: ?>

        <div class="sidebar-auth">
            <a href="login.html" class="btn-login">Iniciar sesión</a>
            <a href="signup.html" class="btn-signup">Crear Cuenta</a>
        </div>

    <?php endif; ?>

    <div class="quote">

        <?php if ($pagina_actual == "inicio") { ?>
            <p>Cada nuevo comienzo trae nuevas oportunidades.</p>
            <small>Freshman Compass</small>
        <?php } elseif ($pagina_actual == "teachers") { ?>
            <p>Un buen maestro puede cambiar una vida.</p>
            <small>Freshman Compass</small>
        <?php } elseif ($pagina_actual == "consejos") { ?>
            <p>Los pequeños hábitos crean grandes resultados.</p>
            <small>Freshman Compass</small>
        <?php } elseif ($pagina_actual == "psicologas") { ?>
            <p>Pedir ayuda también es una muestra de fortaleza.</p>
            <small>Freshman Compass</small>
        <?php } elseif ($pagina_actual == "eventos") { ?>
            <p>Cada experiencia es una oportunidad para crecer.</p>
            <small>Freshman Compass</small>
        <?php } elseif ($pagina_actual == "centro") { ?>
            <p>Tu escuela también es parte de tu historia.</p>
            <small>Freshman Compass</small>
        <?php } elseif ($pagina_actual == "salones") { ?>
            <p>Tu lugar de estudio te da buenas vibras.</p>
            <small>Freshman Compass</small>
        <?php } elseif ($pagina_actual == "compassbot") { ?>
            <p>Una ayuda hace más que millones de dolares.</p>
            <small>Freshman Compass</small>
        <?php } ?>

    </div>

</div>

<script src="../js/navbar.js"></script>