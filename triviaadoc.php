<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trivia ADOC</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles/triviasp.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="icon" type="favicon" href="img/favicon.png">
</head>
<body>

    <a href="javascript:history.back()" class="btn-regresar">
    <i class="fa-solid fa-arrow-left"></i>
    <span>Regresar</span>
</a>

    <div class="stage">

        <div class="stage-wave" aria-hidden="true"></div>
        <i class="fa-solid fa-book stage-icon i1" aria-hidden="true"></i>
        <i class="fa-solid fa-star stage-icon i2" aria-hidden="true"></i>
        <i class="fa-solid fa-trophy stage-icon i3" aria-hidden="true"></i>
        <i class="fa-solid fa-gamepad stage-icon i4" aria-hidden="true"></i>
        <i class="fa-solid fa-star stage-icon i5" aria-hidden="true"></i>
        <i class="fa-solid fa-compass stage-icon i6" aria-hidden="true"></i>

    

    <div class="game-box">

        <div id="screen-loading" class="screen active">
            <div class="loader-content">
                <span class="mission-tag"><i class="fa-solid fa-compass"></i> FreshmanCompass</span>
                <h1>Trivia ADOC</h1>
                <p>Preparando tu misión... ¡Prepárate!</p>
                <div class="spinner"></div>
            </div>
        </div>

        <div id="screen-info" class="screen">
            <div class="info-content">
                <span class="mission-tag"><i class="fa-solid fa-book"></i> Antes de empezar</span>
                <h2>¿Qué es Empresas ADOC?</h2>
              <div class="info-text">
    <p>Empresas ADOC es una empresa salvadoreña fundada en <strong>1953</strong> por <strong>Don Roberto Palomo</strong>. Desde sus inicios se ha dedicado a fabricar y comercializar calzado de alta calidad, convirtiéndose en una de las compañías más importantes de <strong>Centroamérica</strong>.</p>

    <p>Actualmente tiene presencia en <strong>El Salvador, Guatemala, Honduras, Nicaragua, Costa Rica y Panamá</strong>, ofreciendo diferentes marcas de calzado como <strong>ADOC, Hush Puppies, CAT y Rhino</strong>.</p>

    <p>Además de su crecimiento empresarial, ADOC mantiene un fuerte compromiso con la educación y el desarrollo de las comunidades. A través de la <strong>Fundación ADOC</strong> y el <strong>Programa Empresarial ¡Supérate!</strong>, brinda oportunidades de formación a jóvenes del sistema público mediante clases de <strong>inglés, informática y valores</strong>.</p>

    <p>Su cultura se basa en tres principios fundamentales: <strong>Integridad</strong>, <strong>Trabajo en Equipo</strong> y <strong>Pasión por Servir</strong>, valores que han guiado a la empresa durante más de <strong>70 años</strong>.</p>

    <p><strong>¡Presta mucha atención!</strong> Toda esta información será clave para responder correctamente la trivia y obtener el mejor puntaje.</p>
</div>
                <button class="btn" onclick="startQuiz()">
                    <i class="fa-solid fa-flag-checkered"></i>
                    ¡Listo, entendido!
                </button>
            </div>
        </div>

        <div id="screen-quiz" class="screen">
            <div class="progress-bar">
                <i class="fa-solid fa-comment-dots"></i>
                Pregunta <span id="current-num">1</span> de 10
            </div>
            <div class="progress-track">
                <div class="progress-fill" id="progress-fill"></div>
            </div>

            <div id="question-title" class="question-text">Cargando pregunta...</div>

            <div class="options-container" id="options-block">
            </div>

            <div id="feedback" class="feedback-message"></div>
            <button id="btn-next" class="btn" style="display: none;" onclick="nextQuestion()">
                Siguiente Pregunta
                <i class="fa-solid fa-arrow-right"></i>
            </button>

            <div class="quiz-tip">
                <i class="fa-solid fa-lightbulb"></i>
                ¡Piensa bien! Cada respuesta te acerca más al conocimiento.
            </div>
        </div>

        <div id="screen-results" class="screen">
            <div class="results-content">
                <span class="mission-tag"><i class="fa-solid fa-trophy"></i> Misión completada</span>
                <h2>¡Misión Cumplida!</h2>
                <p>Has finalizado la Trivia oficial de Empresas ADOC.</p>

                <div class="score-circle">
                    <div id="final-score" class="score-num">0</div>
                    <div class="score-total">de 10</div>
                </div>

                <div id="rank-message" class="rank-text">Evaluando rango...</div>

                <a href="actividades.php" class="btn">
                    <i class="fa-solid fa-arrow-left"></i>
                    Volver a Actividades
                </a>
            </div>
        </div>

    </div>

    </div>

    <script src="js/triviaadoc.js"></script>

    <!-- Barra de progreso visual: observa el número de pregunta que ya actualiza triviaadoc.js -->
    <script>
        (function(){
            const numEl = document.getElementById('current-num');
            const fillEl = document.getElementById('progress-fill');
            const TOTAL = 10;
            if (!numEl || !fillEl) return;

            function actualizarProgreso(){
                const actual = parseInt(numEl.textContent, 10) || 1;
                fillEl.style.width = ((actual - 1) / TOTAL * 100 + 10) + '%';
            }

            actualizarProgreso();
            new MutationObserver(actualizarProgreso).observe(numEl, { childList:true, characterData:true, subtree:true });
        })();
    </script>

</body>
</html>