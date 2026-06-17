<?php
session_start();


$pagina_actual = "centro";
include("php/conexion.php");

$sql = "SELECT * FROM salones";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salones</title>

    <link rel="stylesheet" href="styles/salones.css">
    <link rel="stylesheet" href="styles/navbar.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
    <main class="contenido">

        <!-- HERO -->

        <section class="hero-salones">

            <div class="hero-overlay">

                <div class="hero-info">

                    <h1>Nuestros Salones</h1>

                    <div class="linea"></div>

                    <p>
                        Conoce los espacios donde desarrollarás tus habilidades,
                        compartirás ideas y vivirás nuevas experiencias.
                    </p>

                </div>

                <div class="hero-mascota">
                    <img src="images/mascota.png" alt="">
                </div>

            </div>

        </section>

        <!-- INFO -->

        <section class="info-salones">

            <div class="icono-info">
                <i class="fa-solid fa-school"></i>
            </div>

            <div class="texto-info">

                <h2>Espacios diseñados para ti</h2>

                <p>
                    Cada salón tiene un propósito especial y está equipado
                    para ayudarte a aprender, colaborar y crecer.
                </p>

            </div>

            <div class="beneficios">

                <div>
                    <i class="fa-solid fa-book-open"></i>
                    <span>Aprende</span>
                </div>

                <div>
                    <i class="fa-solid fa-users"></i>
                    <span>Colabora</span>
                </div>

                <div>
                    <i class="fa-regular fa-message"></i>
                    <span>Comparte</span>
                </div>

                <div>
                    <i class="fa-regular fa-star"></i>
                    <span>Crea</span>
                </div>

            </div>

        </section>

        <!-- CARDS -->

        <section class="cards-salones">

            <?php while($salon = mysqli_fetch_assoc($resultado)){ ?>

            <div class="card">

                <img src="<?php echo $salon['imagen']; ?>" alt="">

                <div class="card-body">

                    <div class="circle-icon">
                        <i class="fa-solid fa-book"></i>
                    </div>

                    <h3><?php echo $salon['nombre']; ?></h3>

                    <h4><?php echo $salon['tipo_salon']; ?></h4>

                    <p>
                        <?php echo $salon['descripcion']; ?>
                    </p>

                    <a href="<?php echo $salon['link_conocer']; ?>" class="btn-salon">
                        Conocer salón
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </div>

            </div>

            <?php } ?>

        </section>

        <!-- FRASE -->

        <section class="frase-final">

            <i class="fa-regular fa-star"></i>

            <p>
                Cada espacio está pensado para inspirarte a dar lo mejor de ti.
                ¡Aprovecha cada oportunidad!
            </p>

            <i class="fa-regular fa-star"></i>

        </section>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>