<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Actividades | FreshmanCompass</title>

    <link rel="stylesheet" href="styles/actividades.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="container">

    <!-- HERO -->

    <section class="hero">

        <img src="img/banner-games.jpeg" class="hero-bg">

        <div class="hero-content">

            <span class="hero-tag">
                <i class="fa-solid fa-rocket"></i>
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

            

        </div>

    </section>

    <!-- TITULO -->

    <section class="title" id="games">

        <span class="mini-title">

            <i class="fa-solid fa-gamepad"></i>

            Juegos y Misiones

        </span>

        <h2>

            Elige tu próxima aventura

        </h2>

        <p>

            Aprende sobre ¡Supérate!, ADOC y habilidades digitales.

        </p>

    </section>

    <!-- TARJETAS -->

    <section class="cards">

        <div class="card">

            <img src="img/triviasp.jpeg">

            <span class="badge trivia">TRIVIA</span>

            <h3>Trivia ¡Supérate!</h3>

            <p>

                Demuestra cuánto sabes sobre el programa.

            </p>

            <a href="triviasuperate.php" class="play">

                Jugar ahora

                <i class="fa-solid fa-arrow-right"></i>

            </a>

        </div>

        <div class="card">

            <img src="img/trivaadoc.jpeg">

            <span class="badge trivia">TRIVIA</span>

            <h3>Trivia ADOC</h3>

            <p>

                Descubre la historia y valores de ADOC.

            </p>

            <a href="triviaadoc.php" class="play">

                Jugar ahora

                <i class="fa-solid fa-arrow-right"></i>

            </a>

        </div>

                <div class="card">

            <img src="img/gerson.png">

            <span class="badge trivia">

                TRIVIA

            </span>

            <h3>Trivia ¡Supérate! ADOC</h3>

            <p>

                Aprende paso a paso cómo crear tu correo institucional.

            </p>

            <a href="#" class="play">

                Jugar ahora

                <i class="fa-solid fa-arrow-right"></i>

            </a>

        </div>

        <div class="card">

            <img src="img/correo.jpeg">

            <span class="badge trivia">

                MINI JUEGO

            </span>

            <h3>Crea tu correo</h3>

            <p>

                Aprende paso a paso cómo crear tu correo institucional.

            </p>

            <a href="#" class="play">

                Jugar ahora

                <i class="fa-solid fa-arrow-right"></i>

            </a>

        </div>

    </section>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const completado = localStorage.getItem('triviaSuperateCompletada');
        const puntajeMaximo = localStorage.getItem('triviaSuperateScore');

        if (completado === 'true') {
            const tarjetaSuperate = document.querySelector('.item-superate');
            
            if (tarjetaSuperate) {
                tarjetaSuperate.style.border = "2px solid #2ecc71";
                
                const scoreBadge = document.createElement('div');
                scoreBadge.style.color = "#2ecc71";
                scoreBadge.style.fontWeight = "bold";
                scoreBadge.style.marginTop = "10px";
                scoreBadge.innerHTML = `✅ ¡Completado! Record: ${puntajeMaximo}/10`;
                
                tarjetaSuperate.appendChild(scoreBadge);
            }
        }
    });
</script>

<script src="js/actividades.js"></script>

</body>

</html>