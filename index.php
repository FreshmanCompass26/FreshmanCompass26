<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freshman Compass</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- ESTILOS -->
    <link rel="stylesheet" href="styles/home-page.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/footer.css">
   
    
    
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
                        <a class="dropdown-item" href="#">
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

    <section class="banner-section">
        <div class="row align-items-center">

            <div class="col-md-6">
                <h1>
                    Tu viaje <br>
                    comienza <span>aquí</span>
                </h1>

                <p>
                    Fortalece competencias digitales mientras exploras tu futuro académico y profesional.
                </p>

                <button class="btn btn-warning">
                    Comienza
                </button>
            </div>

            <div class="col-md-6 text-center">
                <img src="img/fondo_homepg.jpeg" class="img-fluid banner-img">
            </div>

        </div>
    </section>

    <section class="cards-section container mt-4">
        <div class="row g-4 justify-content-center">

            <div class="col-md-3">
                <div class="info-card">
                    <i class="fa-solid fa-users"></i>
                    <h5>Tutores</h5>
                    <p>Apoyo educativo y acompañamiento constante.</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info-card">
                    <i class="fa-solid fa-calendar"></i>
                    <h5>Eventos</h5>
                    <p>Conoce talleres y actividades educativas.</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info-card">
                    <i class="fa-solid fa-lightbulb"></i>
                    <h5>Proyectos</h5>
                    <p>Participa en experiencias innovadoras.</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info-card">
                    <i class="fa-solid fa-book"></i>
                    <h5>Recursos</h5>
                    <p>Materiales y contenido para aprender.</p>
                </div>
            </div>

        </div>
    </section>

<section class="modern-benefits">

    <p class="section-mini-title">
        Beneficios del programa ¡Supérate!
    </p>

    <h2 class="section-title">
        Crece, aprende y transforma tu futuro
    </h2>

    <div class="benefits-modern-grid">

      
        <div class="modern-card blue-card">

            <div class="icon-circle">
                <i class="fa-solid fa-comments"></i>
            </div>

            <div>
                <h3>Inglés Intensivo</h3>

                <p>
                    Mejora tu nivel de inglés y comunícate con confianza.
                </p>
            </div>

        </div>

        <div class="modern-card green-card">

            <div class="icon-circle">
                <i class="fa-solid fa-laptop"></i>
            </div>

            <div>
                <h3>Habilidades Tecnológicas</h3>

                <p>
                    Aprende herramientas digitales esenciales.
                </p>
            </div>

        </div>


        <div class="modern-card yellow-card">

            <div class="icon-circle">
                <i class="fa-solid fa-users"></i>
            </div>

            <div>
                <h3>Desarrollo Personal</h3>

                <p>
                    Fortalece liderazgo y habilidades blandas.
                </p>
            </div>

        </div>

        <div class="modern-card purple-card">

            <div class="icon-circle">
                <i class="fa-solid fa-briefcase"></i>
            </div>

            <div>
                <h3>Oportunidades Profesionales</h3>

                <p>
                    Conecta con experiencias reales.
                </p>
            </div>

        </div>

    </div>

</section>


<section class="testimonials-section">

    <p class="section-mini-title">
        VOCES QUE INSPIRAN
    </p>

    <h2 class="section-title">
        Historias reales, impacto real
    </h2>

    <div class="testimonials-grid">

        <div class="testimonial-card">

            <img src="img/stud1.jpeg">

            <p>
                “¡Supérate! me abrió las puertas a nuevas oportunidades.”
            </p>

            <h4>Ricardo L.</h4>

            <span>Graduado del Centro ¡Supérate! ADOC</span>

        </div>
        <div class="testimonial-card">

            <img src="img/men.png">

            <p>
                “Aquí aprendí que los retos son oportunidades.”
            </p>

            <h4>María G.</h4>

            <span>Graduada del Centro ¡Supérate! ADOC</span>

        </div>

        <div class="testimonial-card">

            <img src="img/men.png">

            <p>
                “Las herramientas y apoyo cambiaron mi vida.”
            </p>

            <h4>Andrés M.</h4>

            <span>Graduado del Centro ¡Supérate! ADOC</span>

        </div>

    </div>

</section>


    <?php include 'php/footer.php'; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>