<?php
session_start();

$pagina_actual = "centro";

include("php/conexion.php");

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

    <link rel="icon" type="image/png" href="img/favicon.png">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>

<?php include("php/navbar.php"); ?>

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
                            <i class="fa-regular fa-user"></i>
                            Perfil
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fa-solid fa-gear"></i>
                            Configuración
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item logout" href="php/logout.php">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Cerrar sesión
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

<div class="main-content">

    <div class="header-testimonio">

        <div class="titulo">
            <h1>Voces que</h1>
            <h2 class="texto-hueco">Inspiran</h2>

            <div class="linea"></div>

            <p>
                Explora los comentarios y experiencias de los estudiantes.
            </p>
        </div>

        <div class="imagen">
            <img src="img/testimonios.png" alt="Testimonios">
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
                        $puntuacion = intval($testimonio['puntuacion']);

                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $puntuacion) {
                                echo '<span class="estrella llena">★</span>';
                            } else {
                                echo '<span class="estrella vacia">★</span>';
                            }
                        }
                        ?>

                    </div>

                    <div class="tarjeta-cuerpo">

                        <div class="contenedor-texto">
                            <p class="texto-testimonio">
                                <?php echo nl2br(htmlspecialchars($testimonio['testimonio'])); ?>
                            </p>
                        </div>

                        <a href="#"
                           class="leer-mas"
                           data-bs-toggle="modal"
                           data-bs-target="#modalTestimonio"

                           data-nombre="<?php echo htmlspecialchars($testimonio['nombre']); ?>"
                           data-anio="<?php echo htmlspecialchars($testimonio['anio_graduacion']); ?>"
                           data-foto="<?php echo htmlspecialchars($testimonio['foto']); ?>"
                           data-estrellas="<?php echo intval($testimonio['puntuacion']); ?>"
                           data-testimonio="<?php echo htmlspecialchars($testimonio['testimonio']); ?>">

                            Leer experiencia completa
                            <i class="fa-solid fa-arrow-right"></i>

                        </a>

                    </div>

                </div>

            <?php endwhile; ?>

        <?php else: ?>

            <div class="tarjeta-testimonio" style="grid-column:1/-1; text-align:center;">
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
            <i class="fa-solid fa-pen"></i>
            Dejar testimonio
        </a>

    </div>

    <div class="final-quote">
        “Transformando vidas vía educación”
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- MODAL -->
<div class="modal fade" id="modalTestimonio" tabindex="-1" aria-labelledby="modalTestimonioLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="modalTestimonioLabel">
                    Testimonio
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Cerrar">
                </button>

            </div>

            <div class="modal-body">

                <div class="d-flex align-items-center mb-4">

                    <img id="modalFoto"
                         src=""
                         alt="Foto"
                         style="
                            width:80px;
                            height:80px;
                            border-radius:50%;
                            object-fit:cover;
                            border:3px solid #e2e8f0;
                         ">

                    <div class="ms-3">

                        <h4 id="modalNombre" class="mb-1"></h4>

                        <p id="modalAnio"
                           class="mb-2 text-primary fw-semibold">
                        </p>

                        <div id="modalEstrellas"></div>

                    </div>

                </div>

                <hr>

                <p id="modalTexto"
                   style="
                        text-align:justify;
                        line-height:1.8;
                        color:#334155;
                   ">
                </p>

            </div>

        </div>

    </div>

</div>

<script>

const modal = document.getElementById("modalTestimonio");

modal.addEventListener("show.bs.modal", function(event){

    const boton = event.relatedTarget;

    document.getElementById("modalNombre").textContent =
        boton.getAttribute("data-nombre");

    document.getElementById("modalAnio").textContent =
        "Graduación: " + boton.getAttribute("data-anio");

    document.getElementById("modalFoto").src =
        boton.getAttribute("data-foto");

    document.getElementById("modalTexto").textContent =
        boton.getAttribute("data-testimonio");

    const estrellas =
        parseInt(boton.getAttribute("data-estrellas"));

    let html = "";

    for(let i=1;i<=5;i++){

        if(i<=estrellas){

            html += '<span style="color:#F4AD0D;font-size:23px;">★</span>';

        }else{

            html += '<span style="color:#d1d5db;font-size:23px;">★</span>';

        }

    }

    document.getElementById("modalEstrellas").innerHTML = html;

});

</script>

</body>
</html>