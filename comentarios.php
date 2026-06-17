<?php
session_start();
$pagina_actual = "centro";
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios</title>

    <link rel="stylesheet" href="styles/comentarios.css">
    <link rel="stylesheet" href="styles/navbar.css"><link rel="stylesheet" href="styles/navbar.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    

<div class="container">

  <?php include 'php/navbar.php'; ?>


      

    <!-- CONTENIDO -->
    <main class="content">

        <!-- TOPBAR -->
       <aside class="sidebar">
    <?php include 'php/navbar.php'; ?>
</aside>

        <!-- HERO -->
        <section class="hero">


            <div class="hero-text">

                <small>Valoramos tu opinión</small>

         <h1>
             Tu comentario <br>
           <span>nos ayuda a crecer</span>
        </h1>

                <p>
                    Nos encanta escuchar tus opiniones,
                    sugerencias o cualquier comentario que
                    tengas.
                </p>

            </div>

            <div class="hero-image">
                
                <img src="img/Captura de pantalla 2026-06-04 103639.png"

                <img src="img/comentario.png" alt="Comentario"


            </div>

        </section>

        <!-- FORMULARIO -->
        <section class="comentario-box">

            <h2>⭐ Comparte tu experiencia ⭐</h2>

            <form>

                <input type="text" placeholder="Tu nombre">

                <div class="row">
                    <input type="email" placeholder="Email">
                    <input type="text" placeholder="Materia">
                </div>

                <textarea placeholder="Tu comentario..."></textarea>

                <button type="submit">
                    Mandar comentario
                </button>

            </form>

            <div class="mensaje">
                💡 Leeremos cada opinión
            </div>

        </section>

        <!-- OPINIONES -->
       <section class="opiniones">

    <h2>✨ ¿Qué opinan los estudiantes? ✨</h2>

    <div class="opiniones-container">

    <div class="card-opinion">
        <img src="img/dayana.png" alt="Dayana">

        <div class="texto">
            <p>
                “En Centro ¡Supérate! ADOC no solo estudio,
                me preparo para un futuro donde yo pongo mis propios límites”
            </p>

            <div class="info">
                <span class="nombre">-Dayana Mangandi</span>
                <span class="grado">3° "A"</span>
            </div>
        </div>

        <div class="estrellas">⭐⭐⭐⭐⭐</div>

    </div>

    <div class="card-opinion">
        <img src="img/gerson.png" alt="Gerson">

        <div class="texto">
            <p>
                “Cada día en Centro ¡Supérate! ADOC es una oportunidad de convertirme en alguien que antes creía imposible”
            </p>

            <div class="info">
                <span class="nombre">-Gerson Miranda</span>
                <span class="grado">2° "A"</span>
            </div>
        </div>

        <div class="estrellas">⭐⭐⭐⭐⭐</div>
    </div>

    <div class="card-opinion">
        <img src="img/freddy.png" alt="Fredy">

        <div class="texto">
            <p>
                “Centro ¡Supérate! ADOC, el lugar donde todo lo que te propongas se puede hacer realidad”
            </p>

            <div class="info">
                <span class="nombre">-Fredy Aguilar</span>
                <span class="grado">3° "A"</span>
            </div>
        </div>

        <div class="estrellas">⭐⭐⭐⭐⭐</div>
    </div>

</div>
           
</section>

    </main>

</div>

</body>
</html>
