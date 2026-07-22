<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trivia ¡Supérate! ADOC</title>
    <link rel="stylesheet" href="styles/triviasp.css">
    <link rel="icon" type="favicon" href="img/favicon.png">
</head>
<body>

    <a href="javascript:history.back()" class="btn-regresar">
    <i class="fa-solid fa-arrow-left"></i>
    <span>Regresar</span>
</a>

    <div class="game-box">

        <!-- Pantalla de carga -->
        <div id="screen-loading" class="screen active">
            <div class="loader-content">
                <h1>Trivia ¡Supérate! ADOC</h1>
                <p>Preparando tu misión... ¡Prepárate!</p>
                <div class="spinner"></div>
            </div>
        </div>

        <!-- Información -->
        <div id="screen-info" class="screen">
            <div class="info-content">
                <h2>Centro ¡Supérate! ADOC</h2>

                <div class="info-text">

                    <p>
                        El Centro ¡Supérate! ADOC brinda oportunidades educativas a jóvenes
                        con deseos de superación, permitiéndoles desarrollar habilidades
                        académicas, tecnológicas y personales que complementan su formación escolar.
                    </p>

                    <p>
                        Uno de los pilares más importantes del programa es el aprendizaje
                        intensivo del <strong>idioma inglés</strong>, una herramienta que abre
                        puertas a nuevas oportunidades académicas y profesionales.
                    </p>

                    <p>
                        Los estudiantes también fortalecen sus conocimientos en
                        <strong>tecnología</strong>, desarrollando competencias digitales que
                        les ayudan a enfrentar los desafíos del mundo actual.
                    </p>

                    <p>
                        Además del aprendizaje académico, el programa fomenta valores como
                        la <strong>responsabilidad</strong>, la <strong>disciplina</strong>,
                        la <strong>perseverancia</strong> y el <strong>liderazgo</strong>,
                        formando jóvenes comprometidos con su futuro y con sus comunidades.
                    </p>

                    <p>
                        Gracias a estas herramientas, los estudiantes pueden convertirse
                        en agentes de cambio, impactando positivamente a sus familias,
                        centros educativos y comunidades.
                    </p>

                    <p>
                        ¡Lee con atención! La siguiente trivia pondrá a prueba tus
                        conocimientos sobre la experiencia y formación que ofrece
                        el Centro ¡Supérate! ADOC.
                    </p>

                </div>

                <button class="btn" onclick="startQuiz()">
                    ¡Listo, entendido!
                </button>
            </div>
        </div>

        <!-- Trivia -->
        <div id="screen-quiz" class="screen">

            <div class="progress-bar">
                Pregunta <span id="current-num">1</span> de 10
            </div>

            <div id="question-title" class="question-text">
                Cargando pregunta...
            </div>

            <div class="options-container" id="options-block"></div>

            <div id="feedback" class="feedback-message"></div>

            <button
                id="btn-next"
                class="btn"
                style="display:none;"
                onclick="nextQuestion()">
                Siguiente Pregunta ❯
            </button>

        </div>

        <!-- Resultados -->
        <div id="screen-results" class="screen">

            <div class="results-content">

                <h2>¡Misión Cumplida!</h2>

                <p>
                    Has finalizado la Trivia oficial del Centro ¡Supérate! ADOC.
                </p>

                <div class="score-circle">
                    <div id="final-score" class="score-num">0</div>
                    <div class="score-total">de 10</div>
                </div>

                <div id="rank-message" class="rank-text">
                    Evaluando rango...
                </div>

                <a href="actividades.php" class="btn">
                    Volver a Actividades
                </a>

            </div>

        </div>

    </div>

    <script src="js/triviasuperateadoc.js"></script>

</body>
</html>