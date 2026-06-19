<?php
session_start();
$pagina_actual = "centro";
include("php/conexion.php");

$sql = "SELECT * FROM testimonios ORDER BY id DESC";
$resultado = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freshman Compass - Testimonios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/centro.css">
    <link rel="stylesheet" href="styles/testimonios.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
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
            <a href="login.html" class="btn-login">Iniciar sesión</a>
            <a href="signup.html" class="btn-signup">Crear Cuenta</a>
        <?php endif; ?>
    </div>
</div>

<?php include 'php/navbar.php'; ?>

<div class="main-content">

    <div class="header-testimonio">
        <div class="titulo">
            <h1>Nuestros Salones</h1>
            <h2 class="texto-hueco">Testimonios</h2>
            <div class="linea"></div>
            <p>Explora los comentarios y experiencias de los estudiantes en cada uno de nuestros salones diseñados para ti.</p>
        </div>
        <div class="decoracion-globos-vista">
            <div class="globo-azul-stars">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
            <div class="globo-blanco-lineas">
                <span class="comillas">“</span> ____ ____ 
            </div>
        </div>
    </div>

    <div class="grid-testimonios">
        <?php 
        if ($resultado && mysqli_num_rows($resultado) > 0):
            while($testimonio = mysqli_fetch_assoc($resultado)): 
        ?>
            <div class="tarjeta-testimonio">
                <div class="tarjeta-header">
                    <div class="avatar-usuario">
                        <img src="<?php echo htmlspecialchars($testimonio['foto']); ?>" alt="Usuario">
                    </div>
                    <div class="info-usuario">
                        <h3><?php echo htmlspecialchars($testimonio['nombre']); ?></h3>
                        <p>Graduación: <?php echo htmlspecialchars($testimonio['anio_graduacion']); ?></p>
                    </div>
                </div>
                <div class="estrellas-puntuacion">
                    <?php 
                    $limite_estrellas = intval($testimonio['puntuacion']);
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $limite_estrellas) {
                            echo '<span class="estrella llena">★</span>';
                        } else {
                            echo '<span class="estrella">★</span>';
                        }
                    }
                    ?>
                </div>
                <div class="tarjeta-cuerpo">
                    <p><?php echo htmlspecialchars($testimonio['testimonio']); ?></p>
                </div>
            </div>
        <?php 
            endwhile; 
        else: 
        ?>
            <div class="tarjeta-testimonio" style="grid-column: 1/-1; text-align: center; padding: 30px;">
                <div class="tarjeta-cuerpo">
                    <p>Aún no hay testimonios publicados. ¡Sé el primero en dejar el tuyo!</p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <section class="ubicacion">
        <h2>
            <i class="fas fa-map-marker-alt"></i>
            Nuestra Ubicación
        </h2>
        <p>Centro ¡Supérate! ADOC</p>
        <div id="map" style="height:450px; width:100%; border-radius: 16px; margin-top: 15px;"></div>
    </section>

    <div class="banner-compartir">
        <div class="banner-izquierdo">
            <div class="icono-banner">
                <i class="fa-solid fa-comment-dots" style="color: #2563eb;"></i>
            </div>
            <div class="texto-banner">
                <h3>¿Quieres compartir tu experiencia?</h3>
                <p>Tu opinión ayuda a mantener motivada a toda nuestra comunidad académica.</p>
            </div>
        </div>
        <a href="agregar-testimonio.php" class="btn-dejar-testimonio">
            <i class="fa-solid fa-pen"></i> Dejar testimonio
        </a>
    </div>

    <div class="final-quote">
        “Transformando vidas vía educación”
    </div>

</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
window.onload = function() {
    const map = L.map('map').setView([13.695831, -89.153296], 17);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    L.marker([13.695831, -89.153296])
    .addTo(map)
    .bindPopup('<b>Centro ¡Supérate! ADOC</b>')
    .openPopup();
};
</script>
</body>
</html>