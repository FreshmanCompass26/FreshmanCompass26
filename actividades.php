<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Actividades | FreshmanCompass</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles/actividades.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="container">

    <!-- HERO -->

    <section class="hero">

        <img src="img/banner-games.jpeg" class="hero-bg" alt="">
        <div class="hero-overlay"></div>

        <div class="hero-content">

            <span class="hero-tag">
                <i class="fa-solid fa-compass"></i>
                FreshmanCompass
            </span>

            <h1>
                ¡Bienvenido a<br>
                <span>FreshmanCompass!</span>
            </h1>

            <p>
                Tu brújula para aprender, explorar y crecer.
                Descubre recursos, participa en actividades
                y completa divertidas misiones.
            </p>

            <ul class="hero-features">
                <li>
                    <span class="icon icon-blue"><i class="fa-solid fa-book-open"></i></span>
                    Aprende
                </li>
                <li>
                    <span class="icon icon-teal"><i class="fa-solid fa-user-group"></i></span>
                    Explora
                </li>
                <li>
                    <span class="icon icon-purple"><i class="fa-solid fa-gamepad"></i></span>
                    Participa
                </li>
                <li>
                    <span class="icon icon-gold"><i class="fa-solid fa-trophy"></i></span>
                    Crece
                </li>
            </ul>

            <a href="#games" class="btn-main">
                <i class="fa-solid fa-compass"></i>
                Comenzar aventura
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </div>

    </section>

    <!-- TITULO -->

    <section class="title" id="games">

        <span class="mini-title">
            <i class="fa-solid fa-gamepad"></i>
            Juegos y Misiones
        </span>

        <h2>
            Elige tu próxima <span>aventura</span>
        </h2>

        <p>
            Aprende sobre ¡Supérate!, ADOC y habilidades digitales.
        </p>

    </section>

    <!-- TARJETAS -->

    <section class="cards">

        <div class="card item-superate">

            <div class="card-media">
                <img src="img/triviasp.jpeg" alt="Trivia ¡Supérate!">
                <span class="badge trivia">TRIVIA</span>
            </div>

            <div class="card-body">
                <h3>Trivia ¡Supérate!</h3>
                <p>Demuestra cuánto sabes sobre el programa.</p>

                <div class="card-note note-blue">
                    <i class="fa-solid fa-graduation-cap"></i>
                    Pon a prueba tus conocimientos
                </div>

                <a href="triviasuperate.php" class="play play-blue">
                    Jugar ahora
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

        </div>

        <div class="card">

            <div class="card-media">
                <img src="img/trivaadoc.jpeg" alt="Trivia ADOC">
                <span class="badge empresa">TRIVIA</span>
            </div>

            <div class="card-body">
                <h3>Trivia ADOC</h3>
                <p>Descubre la historia y valores de ADOC.</p>

                <div class="card-note note-purple">
                    <i class="fa-solid fa-book"></i>
                    Aprende y diviértete
                </div>

                <a href="triviaadoc.php" class="play play-purple">
                    Jugar ahora
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

        </div>

        <div class="card">

            <div class="card-media">
                <img src="img/spadoc.jpeg" alt="Trivia ¡Supérate! ADOC">
                <span class="badge combinada">TRIVIA</span>
            </div>

            <div class="card-body">
                <h3>Trivia ¡Supérate! ADOC</h3>
                <p>Aprende paso a paso cómo crear tu correo institucional.</p>

                <div class="card-note note-teal">
                    <i class="fa-solid fa-bullseye"></i>
                    Misión: Tener puntuaje alto.
                </div>

                <a href="triviasuperateadoc.php" class="play play-teal">
                    Jugar ahora
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

        </div>

        <div class="card">

            <div class="card-media">
                <img src="img/correo.jpeg" alt="Crea tu correo">
                <span class="badge correo">MINI JUEGO</span>
            </div>

            <div class="card-body">
                <h3>Crea tu correo</h3>
                <p>Aprende paso a paso cómo crear tu correo institucional.</p>

                <div class="card-note note-purple">
                    <i class="fa-solid fa-envelope"></i>
                    Desbloquea tu cuenta institucional
                </div>

                <a href="#" class="play play-purple">
                    Jugar ahora
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

        </div>

    </section>

    <!-- FOOTER NOTE -->
    <div class="footer-note">
        <i class="fa-solid fa-star"></i>
        ¡Cada trivia es una misión! Aprende, juega y crece con ADOC.
    </div>

</div>

<script src="Js/actividades.js"></script>

</body>

</html>