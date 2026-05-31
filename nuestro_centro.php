<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/centro.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <title>Freshman Compass</title>
</head>

<body>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<<div class="top-navbar">

<div class="top-right">

    <?php if (isset($_SESSION['usuario_id'])) { ?>

        <div style="
            display:inline-flex;
            align-items:center;
            gap:8px;
            background:#e5e7eb;
            padding:6px 14px;
            border-radius:20px;
            height:40px;
        ">

            <div style="
                width:28px;
                height:28px;
                border-radius:50%;
                background:#7c3aed;
                color:white;
                display:flex;
                align-items:center;
                justify-content:center;
                font-weight:bold;
                font-size:13px;
            ">
                <?php echo strtoupper(substr($_SESSION['nombre'], 0, 1)); ?>
            </div>

            <span style="font-size:14px; font-weight:500; white-space:nowrap;">
                <?php echo $_SESSION['nombre']; ?>
            </span>

            <span style="font-size:12px;">▾</span>

        </div>

    <?php } ?>

</div>

</div>



    
    <div class="sidebar">

        <div class="logo">
            <img src="img/image.jpg" alt="">
            <span>Freshman Compass</span>
        </div>
        <ul class="menu">

            <li >
                <a href="index.php">
                    <i class="fa-solid fa-house"></i>
                    <span>Inicio</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa-solid fa-user-group"></i>
                    <span>Teachers</span>
                </a>
            </li>

            <li class="active">
                <a href="nuestro_centro.php">
                    <i class="fa-solid fa-school"></i>
                    <span>Nuestro centro</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa-solid fa-heart"></i>
                    <span>Consejos</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>Eventos</span>
                </a>
            </li>

        </ul>

        <div class="quote">

            <span class="icon2">❝</span>

            <p>
                Don’t count the days,<br>
                make the days count.
            </p>

            <small>— Muhammad Ali</small>

        </div>

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

      <button>
        <i class="fas fa-arrow-right"></i>
      </button>
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

      <button>
        <i class="fas fa-arrow-right"></i>
      </button>
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