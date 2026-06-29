<?php
session_start();
$pagina_actual = "inicio";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freshman Compass</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300..900;1,9..144,300..900&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="styles/home-page.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/footer.css">
</head>

<body>

<<<<<<< Updated upstream
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

        <?php else: ?>

            <a href="/freshmancompass26/login.php" class="btn-login">
                Iniciar sesión
            </a>

            <a href="/freshmancompass26/signup.html" class="btn-signup">
                Crear Cuenta
            </a>

        <?php endif; ?>

    </div>

</div>

=======
>>>>>>> Stashed changes
<?php include 'php/navbar.php'; ?>

<div class="main-content">

    <!-- HERO -->
    <section class="hero-section">
        <div class="hero-grid-lines" aria-hidden="true"></div>
        <div class="hero-inner">
            <div class="hero-text">
                <span class="hero-badge">
                    <i class="fa-solid fa-compass"></i> Bienvenido a Freshman Compass
                </span>
                <h1>Tu viaje <br>comienza <span>aquí</span></h1>
                <p>Fortalece competencias digitales mientras exploras tu futuro académico y profesional.</p>
                <div class="hero-actions">
                    <a href="login.php" class="btn-hero-primary">Comenzar ahora <i class="fa-solid fa-arrow-right"></i></a>
                    <a href="#beneficios" class="btn-hero-ghost">Conocer más</a>
                </div>
            </div>
            <div class="hero-img">
                <div class="compass-rose" aria-hidden="true">
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="100" cy="100" r="98" class="rose-ring-outer"/>
                        <circle cx="100" cy="100" r="78" class="rose-ring-inner"/>
                        <g class="rose-ticks">
                            <line x1="100" y1="4" x2="100" y2="20"/>
                            <line x1="100" y1="180" x2="100" y2="196"/>
                            <line x1="4" y1="100" x2="20" y2="100"/>
                            <line x1="180" y1="100" x2="196" y2="100"/>
                        </g>
                        <polygon points="100,30 112,100 100,170 88,100" class="rose-needle-main"/>
                        <polygon points="30,100 100,88 170,100 100,112" class="rose-needle-cross"/>
                        <circle cx="100" cy="100" r="7" class="rose-center"/>
                    </svg>
                </div>
               
            </div>
        </div>
    </section>

    <!-- CARDS SUPERIORES -->
    <section class="cards-section">
        <p class="section-eyebrow">Tu punto de partida</p>
        <div class="cards-grid">

            <div class="info-card">
                <span class="info-bearing"></span>
                <div class="info-icon"><i class="fa-solid fa-users"></i></div>
                <h5>Tutores</h5>
                <p>Apoyo educativo y acompañamiento constante.</p>
            </div>

            <div class="info-card amber">
                <span class="info-bearing"></span>
                <div class="info-icon"><i class="fa-solid fa-calendar"></i></div>
                <h5>Eventos</h5>
                <p>Conoce talleres y actividades educativas.</p>
            </div>

            <div class="info-card">
                <span class="info-bearing"></span>
                <div class="info-icon"><i class="fa-solid fa-lightbulb"></i></div>
                <h5>Proyectos</h5>
                <p>Participa en experiencias innovadoras.</p>
            </div>

            <div class="info-card amber">
                <span class="info-bearing"></span>
                <div class="info-icon"><i class="fa-solid fa-book"></i></div>
                <h5>Recursos</h5>
                <p>Materiales y contenido para aprender.</p>
            </div>

        </div>
    </section>

    <!-- BENEFICIOS -->
    <section class="modern-benefits" id="beneficios">

        <p class="section-mini-title">Beneficios del programa ¡Supérate!</p>
        <h2 class="section-title">Crece, aprende y transforma tu futuro</h2>

        <div class="benefits-modern-grid">

            <div class="modern-card navy-card">
                <div class="icon-circle">
                    <i class="fa-solid fa-comments"></i>
                </div>
                <div>
                    <span class="card-tag">Idiomas</span>
                    <h3>Inglés Intensivo</h3>
                    <p>Mejora tu nivel de inglés y comunícate con confianza.</p>
                </div>
            </div>

            <div class="modern-card cream-card">
                <div class="icon-circle">
                    <i class="fa-solid fa-laptop"></i>
                </div>
                <div>
                    <span class="card-tag">Tecnología</span>
                    <h3>Habilidades Tecnológicas</h3>
                    <p>Aprende herramientas digitales esenciales.</p>
                </div>
            </div>

            <div class="modern-card amber-card">
                <div class="icon-circle">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div>
                    <span class="card-tag">Liderazgo</span>
                    <h3>Desarrollo Personal</h3>
                    <p>Fortalece liderazgo y habilidades blandas.</p>
                </div>
            </div>

            <div class="modern-card teal-card">
                <div class="icon-circle">
                    <i class="fa-solid fa-briefcase"></i>
                </div>
                <div>
                    <span class="card-tag">Carrera</span>
                    <h3>Oportunidades Profesionales</h3>
                    <p>Conecta con experiencias reales.</p>
                </div>
            </div>

        </div>
    </section>

    <!-- TESTIMONIOS -->
    <section class="testimonials-section">

        <p class="section-mini-title">Voces que inspiran</p>
        <h2 class="section-title">Historias reales, impacto real</h2>

        <div class="testimonials-grid">

            <div class="testimonial-card">
                <img src="img/stud1.jpeg" alt="Ricardo L.">
                <div class="testimonial-quote">
                    <i class="fa-solid fa-quote-left"></i>
                </div>
                <p>"¡Supérate! me abrió las puertas a nuevas oportunidades."</p>
                <h4>Ricardo L.</h4>
                <span>Graduado del Centro ¡Supérate! ADOC · PROM 2025</span>
            </div>

            <div class="testimonial-card featured">
                <img src="img/willito.jpeg" alt="Wilfredo M.">
                <div class="testimonial-quote">
                    <i class="fa-solid fa-quote-left"></i>
                </div>
                <p>"¡Supérate! fue más que una familia, un lugar que transforma vidas."</p>
                <h4>Wilfredo M.</h4>
                <span>Graduado del Centro ¡Supérate! ADOC · PROM 2011</span>
            </div>

            <div class="testimonial-card">
                <img src="img/xander.jpeg" alt="Xander P.">
                <div class="testimonial-quote">
                    <i class="fa-solid fa-quote-left"></i>
                </div>
                <p>"CSA dejó una huella en mi vida al impulsar mi potencial y abrirme las puertas a nuevas oportunidades."</p>
                <h4>Xander P.</h4>
                <span>Graduado del Centro ¡Supérate! ADOC · PROM 2025</span>
            </div>

        </div>
    </section>

    <!-- ABOUT -->
    <section class="about-cards-section">

        <p class="section-mini-title">Quiénes somos</p>
        <h2 class="about-title">Conoce Freshman Compass</h2>

        <div class="about-cards">

            <div class="about-card">
                <div class="card-icon"><i class="fas fa-bullseye"></i></div>
                <h3>Misión</h3>
                <p>Ayudamos a los estudiantes de nuevo ingreso del Centro ¡Supérate! ADOC a adaptarse de forma más fácil, segura y confiada mediante orientación, acompañamiento y recursos útiles.</p>
            </div>

            <div class="about-card">
                <div class="card-icon"><i class="fas fa-users"></i></div>
                <h3>Valores</h3>
                <p>Empatía, Responsabilidad y Confianza para acompañar a cada estudiante durante su proceso de adaptación.</p>
            </div>

            <div class="about-card">
                <div class="card-icon"><i class="fas fa-book-open"></i></div>
                <h3>Historia</h3>
                <p>Freshman Compass nació para apoyar a los estudiantes de primer año mediante consejos, experiencias y orientación práctica.</p>
            </div>

            <div class="about-card">
                <div class="card-icon"><i class="fas fa-eye"></i></div>
                <h3>Visión</h3>
                <p>Convertirse en la plataforma líder de orientación estudiantil para estudiantes de nuevo ingreso de ¡Supérate! ADOC.</p>
            </div>

        </div>
    </section>

    <?php include 'php/footer.php'; ?>

</div>

<script src="js/navbar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<a href="php/compassbot.php" class="compass-float">🤖</a>

</body>
</html>