<?php
session_start();
$pagina_actual = "centro";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestro Centro – Freshman Compass</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

    <link rel="stylesheet" href="styles/centro.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/footer.css">
</head>

<body>

<?php include 'php/navbar.php'; ?>

<div class="main-content">

    <!-- ── DROPDOWN USUARIO ─────────────── -->
    <div class="page-topbar">
        <?php if (isset($_SESSION['nombre'])): ?>
            <?php
                $nombre  = $_SESSION['nombre'];
                $inicial = strtoupper(substr($nombre, 0, 1));
            ?>
            <div class="dropdown user-dropdown">
                <div class="user-trigger" data-bs-toggle="dropdown">
                    <div class="avatar"><?php echo $inicial; ?></div>
                    <span class="username"><?php echo htmlspecialchars($nombre); ?></span>
                    <i class="fa-solid fa-chevron-down" style="font-size:11px;color:#8a9bb0;"></i>
                </div>
                <ul class="dropdown-menu dropdown-menu-end custom-dropdown">
                    <li class="dropdown-header-user">
                        <div class="avatar-lg"><?php echo $inicial; ?></div>
                        <div>
                            <div class="name"><?php echo htmlspecialchars($nombre); ?></div>
                            <div class="sub">Estudiante</div>
                        </div>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="perfil.html">
                            <i class="fa-regular fa-user"></i> Perfil
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
            <a href="login.html"  class="btn-login">Iniciar sesión</a>
            <a href="signup.html" class="btn-signup">Crear cuenta</a>
        <?php endif; ?>
    </div>

    <!-- ── HERO ──────────────────────────── -->
    <section class="hero">
        <div class="hero-text">
            <span class="hero-eyebrow">
                <i class="fa-solid fa-location-dot"></i> Centro ¡Supérate! ADOC
            </span>
            <h1>Conoce tu nuevo<br>hogar en <em>¡Supérate!</em></h1>
            <p>Explora cada espacio, descubre nuestra historia y prepárate para una experiencia increíble.</p>
            <a href="actividades.php" class="explore-btn">
                <i class="fas fa-compass"></i> Explora y Aprende
            </a>
        </div>

        <div class="hero-image">
            <img src="img/cento.jpeg" alt="Centro Supérate ADOC">
        </div>
    </section>

    <!-- ── EXPLORA ───────────────────────── -->
    <section class="explora-section">
        <p class="section-eyebrow">Descubre</p>
        <h2 class="section-title">Explora Freshman Compass</h2>
        <p class="section-subtitle">Descubre todo lo que puedes hacer dentro del programa.</p>

        <div class="cards">

            <div class="card">
                <div class="card-photo-placeholder">
                     <img src="images/c3.jpeg" alt="Nuestros salones"> 
                </div>
                <div class="card-body">
                    <div class="card-icon-wrap">
                        <i class="fas fa-school"></i>
                    </div>
                    <h3>Nuestros salones</h3>
                    <p>Conoce los espacios donde aprendemos, creamos y desarrollamos nuevas ideas.</p>
                    <a href="salones.php" class="card-link">
                        Descubrir más <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-photo-placeholder">
                    <img src="img/recursos.jpeg" alt="Centro de Recursos">
                </div>
                <div class="card-body">
                    <div class="card-icon-wrap teal">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Centro de Recursos</h3>
                    <p>Accede a materiales de Inglés, Informática y Valores para seguir aprendiendo y fortalecer tus habilidades.</p>
                    <a href="recursos.php" class="card-link">
                        Explorar recursos <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-photo-placeholder">
                     <img src="img/olap.jpeg" alt="Testimonios"> 
                </div>
                <div class="card-body">
                    <div class="card-icon-wrap green">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Testimonios</h3>
                    <p>Historias reales de estudiantes que vivieron la experiencia Freshman Compass.</p>
                    <a href="testimonios.php" class="card-link">
                        Leer testimonios <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- ── INFO BOX ──────────────────────── -->
    <section class="info-box">
        <div class="info-text">
            <h2>El programa ¡Supérate! nació con el propósito de transformar vidas a través de la educación.</h2>
        </div>

        <div class="info-image">
            <img src="img/fot.jpeg" alt="Estudiantes Supérate">
        </div>

        <div class="info-text">
            <h2>Hoy somos una comunidad que sigue creciendo e impactando el futuro.</h2>
        </div>
    </section>

    <!-- ── HISTORIA / TIMELINE ───────────── -->
    <section class="history">
        <div class="history-header">
            <p class="section-eyebrow">Nuestra Historia</p>
            <h2>Nuestro camino, nuestro impacto</h2>
            <p>Conoce los momentos clave que han marcado el crecimiento del programa ¡Supérate! a lo largo del tiempo.</p>
        </div>

        <!-- Fila de íconos conectados -->
        <div class="timeline-connector">

            <div class="tl-icon-wrap">
                <div class="tl-icon-circle"><i class="fas fa-flag"></i></div>
                <div class="tl-arrow"></div>
            </div>

            <div class="tl-icon-wrap">
                <div class="tl-icon-circle"><i class="fas fa-users"></i></div>
                <div class="tl-arrow"></div>
            </div>

            <div class="tl-icon-wrap">
                <div class="tl-icon-circle"><i class="fas fa-chart-line"></i></div>
                <div class="tl-arrow"></div>
            </div>

            <div class="tl-icon-wrap">
                <div class="tl-icon-circle"><i class="fas fa-star"></i></div>
                <div class="tl-arrow"></div>
            </div>

            <div class="tl-icon-wrap">
                <div class="tl-icon-circle"><i class="fas fa-heart"></i></div>
                <div class="tl-arrow"></div>
            </div>

        </div>

        <!-- Fila de cards -->
        <div class="timeline">

            <div class="timeline-card">
                <div class="timeline-card-inner">
                    <span class="tl-year-badge">2004</span>
                    <h3>Fundación</h3>
                    <p>El programa nace con el objetivo de brindar una educación de calidad y abrir puertas al futuro.</p>
                </div>
                <img src="img/2004.jpeg" alt="Fundación 2004">
            </div>

            <div class="timeline-card">
                <div class="timeline-card-inner">
                    <span class="tl-year-badge">2008</span>
                    <h3>Expansión</h3>
                    <p>Se abren más centros beneficiando a más estudiantes y comunidades.</p>
                </div>
                <img src="img/2008.jpeg" alt="Expansión 2008">
            </div>

            <div class="timeline-card">
                <div class="timeline-card-inner">
                    <span class="tl-year-badge">2012</span>
                    <h3>Crecimiento</h3>
                    <p>Se fortalecen programas académicos y tecnológicos para una formación integral.</p>
                </div>
                <img src="img/2012.jpeg" alt="Crecimiento 2012">
            </div>

            <div class="timeline-card">
                <div class="timeline-card-inner">
                    <span class="tl-year-badge">2016</span>
                    <h3>Oportunidades</h3>
                    <p>Estudiantes comienzan a obtener becas y oportunidades laborales que transforman vidas.</p>
                </div>
                <img src="img/2016.jpeg" alt="Oportunidades 2016">
            </div>

            <div class="timeline-card">
                <div class="timeline-card-inner">
                    <span class="tl-year-badge">2026</span>
                    <h3>Actualidad</h3>
                    <p>Freshman Compass continúa creciendo e impactando vidas, preparando líderes para el mañana.</p>
                </div>
                <img src="img/2026.jpeg" alt="Actualidad 2026">
            </div>

        </div>
    </section>

    <!-- ── UBICACIÓN ─────────────────────── -->
    <section class="ubicacion">
        <div class="ubicacion-header">
            <i class="fas fa-map-marker-alt"></i>
            <h2>Nuestra Ubicación</h2>
        </div>
        <p>Centro ¡Supérate! ADOC — San Salvador, El Salvador</p>
        <div id="map"></div>
    </section>

    <!-- ── QUOTE ─────────────────────────── -->
    <div class="final-quote">
        "Transformando vidas vía educación"
    </div>

    <?php include 'php/footer.php'; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="js/navbar.js"></script>

<script>
window.addEventListener('load', function () {
    const map = L.map('map').setView([13.695831, -89.153296], 17);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);
    L.marker([13.695831, -89.153296])
        .addTo(map)
        .bindPopup('<b>Centro ¡Supérate! ADOC</b>')
        .openPopup();
});
</script>

<a href="php/compassbot.php" class="compass-float" style="
    position:fixed; bottom:24px; right:24px;
    width:54px; height:54px;
    background:#1e3a8a; color:white;
    border-radius:50%;
    display:flex; align-items:center; justify-content:center;
    font-size:24px; text-decoration:none;
    box-shadow:0 4px 18px rgba(0,0,0,.22);
    z-index:9999; transition:.3s;
" onmouseover="this.style.background='#3b6fd4'" onmouseout="this.style.background='#1e3a8a'">🤖</a>

</body>
</html>