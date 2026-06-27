<?php

$pagina_actual="psicologas";

include("navbar.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freshman Compass</title>
    <link rel="stylesheet" href="../styles/psicologas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

        <li class="<?= ($pagina_actual == 'inicio') ? 'active' : '' ?>">
            <a href="index.php">
                <i class="fa-solid fa-house"></i>
                <span>Inicio</span>
            </a>
        </li>

        <?php if (isset($_SESSION['nombre'])) { ?>

           <li class="<?= ($pagina_actual == 'teachers') ? 'active' : '' ?>">
                <a href="/freshmancompass26/php/teachers.php">
                <i class="fa-solid fa-user-group"></i>
                <span>Teachers</span>


            <li class="<?= ($pagina_actual == 'centro') ? 'active' : '' ?>">
                <a href="nuestro_centro.php">
                    <i class="fa-solid fa-school"></i>
                    <span>Nuestro centro</span>
                </a>
            </li>

            
            <li class="<?= ($pagina_actual == 'eventos') ? 'active' : '' ?>">
                <a href="eventos.php">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>Eventos</span>
                </a>
            </li>

        <?php } ?>
    </ul>

    <!-- Contenido -->
    <main class="content">

    

        <!-- Título -->
        <section class="hero">
            <div class="hero-text">
                <h1>Psicólogas</h1>
                <p>Estamos aquí para acompañarte.</p>

                <div class="line"></div>

                <div class="description">
                    La psicología te ayuda a comprenderte, manejar emociones y mejorar la calidad de vida.
                </div>
            </div>

            <img src="https://cdn-icons-png.flaticon.com/512/4140/4140048.png" alt="Ilustración">
        </section>

        <!-- Áreas -->
        <section>
            <h2>Áreas en la que podemos ayudarte.</h2>

    <div class="cards">


        
    <div class="card">
        <div class="icon heart">
            <i class="fas fa-heart"></i>
        </div>

        <div class="card-text">
            <h3>Apoyo emocional</h3>
            <div class="underline purple"></div>
            <p>Si te sientes triste, abrumado o con ansiedad podemos escucharte y orientarte.</p>
        </div>

        <div class="decor decor-purple"></div>
    </div>

    <div class="card">
        <div class="icon users">
            <i class="fas fa-user-friends"></i>
        </div>

        <div class="card-text">
            <h3>Relaciones y convivencia</h3>
            <div class="underline pink"></div>
            <p>Mejora tus relaciones y fomenta una comunicación saludable.</p>
        </div>

        <div class="decor decor-pink"></div>
    </div>

    <div class="card">
        <div class="icon book">
            <i class="fas fa-book-open"></i>
        </div>

        <div class="card-text">
            <h3>Estrés académico</h3>
            <div class="underline blue"></div>
            <p>Organiza tu tiempo y mejora tu rendimiento estudiantil.</p>
        </div>

        <div class="decor decor-blue"></div>
    </div>

    <div class="card">
        <div class="icon star">
            <i class="fas fa-star"></i>
        </div>

        <div class="card-text">
            <h3>Conócete mejor</h3>
            <div class="underline yellow"></div>
            <p>Descubre tus fortalezas y metas para tomar mejores decisiones.</p>
        </div>

        <div class="decor decor-yellow"></div>
    </div>

</div>

        </section>

        <!-- Psicólogas -->
       <section>
    <h2>Nuestro equipo de apoyo psicológico</h2>
    <p class="sub">Conoce a las profesionales que te acompañarán en tu proceso.</p>

    <div class="psychologists">

        <div class="psych-card">
            <div class="img-container">
               <img src="../img/analu.jpeg" alt="Ana Lucía Nieto">
                <div class="mail-icon"><i class="fas fa-envelope"></i></div>
            </div>

            <h3>Psic. Ana Lucía Nieto</h3>
            <span>Psicóloga Educativa</span>

            <hr>

            <p>Especialista en apoyo emocional y orientación estudiantil.</p>
        </div>

        <div class="psych-card">
            <div class="img-container">
                <img src="../img/marielos.jpeg" alt="Blanca Marielos">
                <div class="mail-icon"><i class="fas fa-envelope"></i></div>
            </div>

            <h3>Psic. Blanca Marielos</h3>
            <span>Psicóloga Clínica</span>

            <hr>

            <p>Especialista en bienestar emocional y terapia cognitivo-conductual.</p>
        </div>

        <div class="psych-card">
            <div class="img-container">
                <img src="../img/melendez.jpeg" alt="Blanca Meléndez">
                <div class="mail-icon"><i class="fas fa-envelope"></i></div>
            </div>

            <h3>Psic. Blanca Meléndez</h3>
            <span>Psicóloga Familiar</span>

            <hr>

            <p>Especialista en terapia familiar y resolución de conflictos.</p>
        </div>

    </div>
</section>


        <!-- Agenda -->
        <section class="appointment">
            <div>
                <h4>¿Necesitas hablar con alguien?</h4>
                <p>Agenda una cita con una de nuestras psicólogas y da el primer paso hacia tu bienestar.</p>
            </div>

        <a href="agendar.php" class="btn">
        Agendar cita
        <i class="fas fa-arrow-right"></i>
        </a>
        </section>

    </main>

</body>
</html>