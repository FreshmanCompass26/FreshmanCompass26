<?php
session_start();

$pagina_actual = "centro";
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

    <link rel="stylesheet" href="styles/centro.css">
    <link rel="stylesheet" href="styles/navbar.css">
    
</head>

<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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

</div>


<div class="main-content">

  <section class="hero">

    <div class="hero-text">
      <h1>Conoce tu nuevo hogar en ¡Supérate!</h1>

      <p>
        Explora cada espacio, descubre nuestra historia
        y prepárate para una experiencia increíble.
      </p>

      <button class="explore-btn">
        <i class="fas fa-compass"></i>
        Explorar centro
      </button>
    </div>

    <div class="hero-image">
      <img src="img/cento.jpeg" alt="Centro Supérate">
    </div>

  </section>

  <section class="cards">
<div class="card">
      <div class="card-icon">
        <i class="fas fa-school"></i>
      </div>


      
   
      <h3>Nuestros salones</h3>

      <p>
        Conoce los espacios donde aprendemos,
        creamos y desarrollamos nuevas ideas.
      </p>
      <a href="salones.php">
       <button>
        <i class="fas fa-arrow-right"></i>
      </button>
     </a>
    </div>


    <div class="card">
      <div class="card-icon food">
        <i class="fas fa-utensils"></i>
      </div>

      <h3>Nuestra cafetería</h3>

      <p>
        Un espacio para descansar, compartir
        y recargar energías.
      </p>

      <button>
        <i class="fas fa-arrow-right"></i>
      </button>
    </div>

    <div class="card">
      <div class="card-icon">
        <i class="fas fa-users"></i>
      </div>


      
      <h3>Testimonios</h3>

      <p>
        Historias reales de estudiantes que
        vivieron la experiencia Freshman Compass.
      </p>
      

      
      <a href="testimonios.php">
      <button>
        <i class="fas fa-arrow-right"></i>
      </button>
      </a>
    </div>
    

  </section>

  <section class="info-box">

    <div class="info-text">
      <h2>
        El programa ¡Supérate! nació con el propósito
        de transformar vidas a través de la educación.
      </h2>
    </div>

    <div class="info-image">
      <img src="img/fot.jpeg" alt="">
    </div>

    <div class="info-text">
      <h2>
        Hoy somos una comunidad que sigue creciendo
        e impactando el futuro.
      </h2>
    </div>

  </section>


  <section class="history">

    <h2>
      <i class="fas fa-book-open"></i>
      Nuestra historia
    </h2>

    <div class="timeline">

      <div class="timeline-card">
        <span>2004 - Fundación</span>

        <img src="img/2004.jpeg">

        <p>
          El programa nace con el objetivo
          de brindar educación de calidad.
        </p>
      </div>

      <div class="timeline-card">
        <span>2008 - Expansión</span>

        <img src="img/2008.jpeg">

        <p>
          Se comienzan a abrir más centros
          beneficiando a más estudiantes.
        </p>
      </div>

      <div class="timeline-card">
        <span>2012 - Crecimiento</span>

        <img src="img/2012.jpeg">

        <p>
          Se fortalecen programas académicos
          y tecnológicos.
        </p>
      </div>

      <div class="timeline-card">
        <span>2016 - Más oportunidades</span>

        <img src="img/2016.jpeg">

        <p>
          Estudiantes comienzan a obtener
          becas y oportunidades laborales.
        </p>
      </div>

      <div class="timeline-card">
        <span>2026 - Actualidad</span>

        <img src="img/2026.jpeg">

        <p>
          Freshman Compass continúa creciendo
          e impactando vidas.
        </p>
      </div>

    </div>

  </section>

  <div class="final-quote">
    “Transformando vidas vía educación”
  </div>

</div>
</body>
</html>