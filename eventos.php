<?php
session_start();

$pagina_actual = "eventos";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="styles/eventos.css">
    <link rel="stylesheet" href="styles/navbar.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
    
<body>

    
<div class="top-navbar">

    <div class="top-right">

        <?php if (isset($_SESSION['nombre'])): ?>

            <?php 
                $nombre = $_SESSION['nombre'];
                $inicial = strtoupper(substr($nombre, 0, 1));
            ?>

            <div class="dropdown user-dropdown">

                <div class="user-trigger" data-bs-toggle="dropdown">

                    <div class="avatar">
                        <?php echo $inicial; ?>
                    </div>

                    <span class="username">
                        <?php echo $nombre; ?>
                    </span>

                    <i class="fa-solid fa-chevron-down"></i>

                </div>
                <ul class="dropdown-menu dropdown-menu-end custom-dropdown">

                    <li class="dropdown-header-user">
                        <div class="avatar-lg">
                            <?php echo $inicial; ?>
                        </div>

                        <div>
                            <div class="name"><?php echo $nombre; ?></div>
                            <div class="sub">Bienvenido</div>
                        </div>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <a class="dropdown-item" href="perfil.html">
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

        <?php else: ?>

            <a href="login.html" class="btn-login">
                Iniciar sesión
            </a>

            <a href="signup.html" class="btn-signup">
                Crear Cuenta
            </a>

        <?php endif; ?>

    </div>

</div>

<?php include 'php/navbar.php'; ?>


    <div class="main-content">


        <div class="title-section">

            <h1>Eventos que se llevan a cabo.</h1>

            <p>
                No te pierdas actividades escolares
                que llevamos a cabo en nuestro centro.
            </p>

        </div>

        <div class="events-grid">

            <div class="event-card active-card">

                <div class="date-box">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>17</span>
                </div>

                <h3>Thanksgiving</h3>

                <h4>27/11/2022</h4>

                <div class="location">
                    <i class="fa-solid fa-location-dot"></i>
                    Centro ¡Supérate! ADOC
                </div>

                <img src="img/Thanksgiving.png" class="event-img">

                <small>
                    Un día lleno de agradecimiento y sobre todo diversión
                    entre todos los alumnos. Un día inolvidable y sobre
                    todo memorable que hay muchas sorpresas.
                </small>

                <a href="https://flic.kr/s/aHBqjCCv2K">
                <button>
                    Ver mas...
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
                </a>
            </div>

            <div class="event-card">

                <div class="date-box">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>17</span>
                </div>

                <h3>Hackathon</h3>

                <h4>29/11/2022</h4>

                <div class="location">
                    <i class="fa-solid fa-location-dot"></i>
                    Centro ¡Supérate! ADOC
                </div>

                <img src="img/Hackathon.png" class="event-img">

                <small>
                    La creación y diseño de tu propia app,
                    buscar una problemática y una solución digital.
                </small>
                    
                <a href="https://www.instagram.com/reels/DE583Fsy5Mq/">
                <button>
                    Ver mas...
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
                </a>
            </div>

            <div class="event-card">

                <div class="date-box">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>17</span>
                </div>

                <h3>Children’s day</h3>

                <h4>01/10/2022</h4>

                <div class="location">
                    <i class="fa-solid fa-location-dot"></i>
                    Centro ¡Supérate! ADOC
                </div>

                <img src="img/Childrensday.png" class="event-img">

                <small>
                    No te detienes mucho... pero este día es otro nivel.
                    Ven con la mente abierta y listo para lo inesperado.
                </small>
                <a href="https://flic.kr/s/aHBqjBKU3x">
                <button>
                    Ver mas...
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
                </a>
            </div>

            <div class="event-card">

                <div class="date-box">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>17</span>
                </div>

                <h3>EXPO</h3>

                <h4>01/10/2022</h4>

                <div class="location">
                    <i class="fa-solid fa-location-dot"></i>
                    Centro ¡Supérate! ADOC
                </div>

                <img src="img/Expo.png" class="event-img">

                <small>
                    Los estudiantes de 2° año realizan una expo donde
                    presentan sus proyectos aprendidos y programación.
                </small>


                <a href="https://flic.kr/s/aHBqjCrXdK">
                <button>
                    Ver mas...
                    <i class="fa-solid fa-arrow-right"></i>

                </button>
                </a>
            </div>

        </div>

      <a href="mas-eventos.php" class="more-btn">
             Ver más...
        </a>
</div>

</div>

</body>
</html>
