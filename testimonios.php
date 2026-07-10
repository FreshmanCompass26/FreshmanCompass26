<?php

session_start();

$pagina_actual = "centro";

include("php/navbar.php");
include("php/conexion.php"); // asegúrate de que aquí exista $conn

// Validar conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta
$sql = "SELECT * FROM testimonios ORDER BY id DESC";
$resultado = mysqli_query($conn, $sql);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conn));
}

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="favicon" href="img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>

<!-- TOP NAVBAR -->
<div class="top-navbar">
    <div class="top-right">

        <?php if (isset($_SESSION['nombre'])): ?>
            <?php 
                $nombre = $_SESSION['nombre'];
                $inicial = strtoupper(substr($nombre, 0, 1));
            ?>

            <div class="dropdown user-dropdown">
                <div class="user-trigger" data-bs-toggle="dropdown">
                    <div class="avatar"><?php echo $inicial; ?></div>
                    <span class="username"><?php echo htmlspecialchars($nombre); ?></span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>

                <ul class="dropdown-menu dropdown-menu-end custom-dropdown">
                    <li class="dropdown-header-user">
                        <div class="avatar-lg"><?php echo $inicial; ?></div>
                        <div>
                            <div class="name"><?php echo htmlspecialchars($nombre); ?></div>
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

<!-- CONTENIDO -->
<div class="main-content">

    <div class="header-testimonio">
        <div class="titulo">
            <h1>Voces que</h1>
            <h2 class="texto-hueco"> Inspiran</h2>
            <div class="linea"></div>
            <p>Explora los comentarios y experiencias de los estudiantes.</p>
        </div>
        <div class= "imagen">
            <img src="img/testimonios.png" alt="testimonios">
        </div>
    </div>

    <!-- GRID -->
    <div class="grid-testimonios">

        <?php if (mysqli_num_rows($resultado) > 0): ?>
            
            <?php while($testimonio = mysqli_fetch_assoc($resultado)): ?>

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
                        $limite = intval($testimonio['puntuacion']);

                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $limite) {
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

            <?php endwhile; ?>

        <?php else: ?>

            <div class="tarjeta-testimonio" style="grid-column: 1/-1; text-align:center;">
                <p>No hay testimonios aún. ¡Sé el primero en publicar!</p>
            </div>

        <?php endif; ?>

    </div>

    <div class="banner-compartir">
        <div class="banner-izquierdo">
            <i class="fa-solid fa-comment-dots"></i>
            <div>
                <h3>¿Quieres compartir tu experiencia?</h3>
                <p>Tu opinión ayuda a la comunidad.</p>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>