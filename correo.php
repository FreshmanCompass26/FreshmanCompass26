<?php

$casos = [

    1 => [
        "titulo" => " Ausencia por cita médica",
        "descripcion" => "Debes informar una ausencia debido a una cita médica."
    ],

    2 => [
        "titulo" => " Problema con Microsoft Teams",
        "descripcion" => "No puedes acceder a Teams y necesitas reportarlo."
    ],

    3 => [
        "titulo" => " Solicitud de reposición",
        "descripcion" => "Faltaste a una evaluación y deseas solicitar reposición."
    ],

    4 => [
        "titulo" => " Retraso por transporte",
        "descripcion" => "Llegarás tarde debido a problemas de transporte."
    ]

];

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Simulador de Correos Profesionales
    </title>

    <link rel="stylesheet"
          href="styles/correo.css">

</head>

<body>

    <a href="javascript:history.back()" class="btn-regresar">
    <i class="fa-solid fa-arrow-left"></i>
    <span>Regresar</span>
</a>


<div class="game-box">

<div id="screen-loading"
     class="screen active">

    <h1>
         Simulador de Correo Profesional
    </h1>

    <p>
        Preparando actividad...
    </p>

    <div class="spinner"></div>

</div>
<div id="screen-info"
     class="screen">

    <h2>
        Comunicación Profesional por Correo Electrónico
    </h2>

    <div class="info-image">

        <img
            src="img/correoo.jpeg"
            alt="Correo Profesional">

    </div>

    <div class="info-text">

        <p>

            En ¡Supérate! ADOC, el correo electrónico
            es una herramienta importante para
            comunicarse con teachers,
            y personal administrativo.

        </p>

        <p>

            Un correo profesional permite informar
            ausencias, solicitar apoyo académico,
            comunicar inconvenientes o realizar
            consultas de manera formal y respetuosa.

        </p>

        <h3>
            Partes de un correo profesional
        </h3>

        <ul>

            <li>
                <strong>Asunto:</strong>
                Resume el motivo del mensaje.
            </li>

            <li>
                <strong>Saludo:</strong>
                Muestra respeto al destinatario.
            </li>

            <li>
                <strong>Introducción:</strong>
                Inicia el mensaje de forma cordial.
            </li>

            <li>
                <strong>Cuerpo:</strong>
                Explica claramente la situación.
            </li>

            <li>
                <strong>Despedida:</strong>
                Cierra el mensaje educadamente.
            </li>

            <li>
                <strong>Firma:</strong>
                Identifica al estudiante.
            </li>

        </ul>

    </div>

    <div class="video-container">

        <h3>
             Video Explicativo
        </h3>

        <!-- ========================================================= -->
        <!-- SUSTITUYE ÚNICAMENTE 'TU_ID_DE_VIDEO' POR EL ID DEL VIDEO  -->
        <!-- Ejemplo: https://www.youtube.com/embed/dQw4w9WgXcQ       -->
        <!-- ========================================================= -->
        <iframe 
            width="100%" 
            height="315" 
            src="https://www.youtube.com/embed/DqISek3qpVg" 
            title="Video Explicativo" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowfullscreen>
        </iframe>

    </div>

    <button class="btn"
            onclick="showScreen('screen-casos')">

        Entendido, continuar →

    </button>

</div>

<div id="screen-casos"
     class="screen">

    <h2>
        Selecciona un caso
    </h2>

    <p>
        Elige la situación que resolverás
        mediante un correo profesional.
    </p>

    <div class="casos-container">

        <?php foreach($casos as $id => $caso): ?>

        <label class="caso-card">

            <input
                type="radio"
                name="selected_caso"
                value="<?= $id ?>"
                <?= $id == 1 ? 'checked' : '' ?>>

            <h3>
                <?= $caso["titulo"] ?>
            </h3>

            <p>
                <?= $caso["descripcion"] ?>
            </p>

        </label>

        <?php endforeach; ?>

    </div>

    <h3 style="margin-top:30px;">
        Selecciona la dificultad
    </h3>

    <div class="difficulty-container">

        <button
            class="btn"
            onclick="iniciarJuego('facil')">

             Fácil
            <br>
            Ordenar correo

        </button>

        <button
            class="btn btn-success"
            onclick="iniciarJuego('dificil')">

             Difícil
            <br>
            Redactar correo

        </button>

    </div>

</div>

<div id="screen-facil"
     class="screen">

    <h2>
         Modo Fácil
    </h2>

    <p>
        Arrastra los fragmentos hasta formar
        correctamente el correo profesional.
    </p>

    <div class="outlook-sim">

        <div id="sortable-correo"
             class="sortable-correo">

        </div>

    </div>

    <button class="btn"
            onclick="evaluarCorreo()">

        Validar Orden

    </button>

</div>

<div id="screen-dificil"
     class="screen">

    <h2>
         Modo Difícil
    </h2>

    <p>
        Redacta el correo profesional
        utilizando una estructura adecuada.
    </p>

    <div class="outlook-sim">

        <div class="outlook-field">

            <label>
                Asunto
            </label>

            <input
                type="text"
                id="d_asunto"
                placeholder="Escribe el asunto">

        </div>

        <div class="outlook-field">

            <label>
                Correo
            </label>

            <textarea
                id="d_cuerpo"
                placeholder="Redacta aquí tu correo profesional..."></textarea>

        </div>

    </div>

    <button class="btn btn-success"
            onclick="evaluarDificil()">

        Evaluar Correo

    </button>

</div>

<div id="screen-results"
     class="screen">

    <h2>
         Resultados
    </h2>

    <div id="result-score"
         style="
            font-size:28px;
            font-weight:bold;
            margin:20px 0;
         ">
    </div>

    <div id="result-feedback-list"
         style="
            text-align:left;
            margin-top:20px;
            max-height:300px;
            overflow-y:auto;
         ">
    </div>

    <br>

    <button
        class="btn"
        onclick="location.reload()">

         Intentar nuevamente

    </button>

</div>

</div>


<script>

const datosCasos = {

    1: {

        palabras_clave: [
            "cita",
            "médica",
            "ausencia",
            "doctor",
            "permiso"
        ],

        saludos_validos: [
            "estimada",
            "estimado",
            "buenos días",
            "buenas tardes"
        ],

        bloques_facil: {

            asunto:
                "Ausencia por cita médica",

            saludo:
                "Estimada Lic. Martínez:",

            introduccion:
                "Espero que se encuentre muy bien.",

            cuerpo:
                "Le informo que mañana no podré asistir debido a una cita médica previamente programada.",

            despedida:
                "Agradezco su comprensión y apoyo.",

            firma:
                "Daniel Reyes - 1° Año"

        }

    },

    2: {

        palabras_clave: [
            "teams",
            "acceso",
            "problema",
            "plataforma",
            "cuenta"
        ],

        saludos_validos: [
            "estimado",
            "estimada",
            "buenas tardes"
        ],

        bloques_facil: {

            asunto:
                "Problema de acceso a Microsoft Teams",

            saludo:
                "Estimado Coordinador:",

            introduccion:
                "Espero que se encuentre bien.",

            cuerpo:
                "Le escribo para informar que actualmente no puedo acceder a Microsoft Teams.",

            despedida:
                "Muchas gracias por su atención.",

            firma:
                "Daniel Reyes - 1° Año"

        }

    },

    3: {

        palabras_clave: [
            "evaluación",
            "reposición",
            "ausencia",
            "actividad",
            "solicitud"
        ],

        saludos_validos: [
            "estimado teacher",
            "estimada teacher"
        ],

        bloques_facil: {

            asunto:
                "Solicitud de reposición de evaluación",

            saludo:
                "Estimado Teacher:",

            introduccion:
                "Reciba un cordial saludo.",

            cuerpo:
                "Debido a una ausencia justificada no pude realizar la evaluación correspondiente.",

            despedida:
                "Quedo atento a su respuesta.",

            firma:
                "Daniel Reyes - 1° Año"

        }

    },

    4: {

        palabras_clave: [
            "transporte",
            "retraso",
            "llegada",
            "demora",
            "puntualidad"
        ],

        saludos_validos: [
            "estimada",
            "estimado"
        ],

        bloques_facil: {

            asunto:
                "Notificación de retraso",

            saludo:
                "Estimada Licenciada:",

            introduccion:
                "Espero que se encuentre bien.",

            cuerpo:
                "Le informo que llegaré con retraso debido a problemas con el transporte público.",

            despedida:
                "Gracias por su comprensión.",

            firma:
                "Daniel Reyes - 1° Año"

        }

    }

};

</script>

<script src="js/correo.js"></script>

</body>
</html>