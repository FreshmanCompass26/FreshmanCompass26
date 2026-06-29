<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trivia ¡Súpérate! ADOC</title>
    <link rel="stylesheet" href="styles/triviasp.css">
</head>
<body>

    <div class="game-box">

        <div id="screen-loading" class="screen active">
            <div class="loader-content">
                <h1>Trivia ¡Súpérate! ADOC</h1>
                <p>Preparando tu misión... ¡Prepárate!</p>
                <div class="spinner"></div>
            </div>
        </div>

        <div id="screen-info" class="screen">
            <div class="info-content">
                <h2>Centro ¡Súpérate! ADOC</h2>
                <div class="info-text">
                    <p>El Centro ¡Súpérate! ADOC abrió sus puertas en el año <strong>2008</strong> en Soyapango, El Salvador, convirtiéndose en el <strong>segundo centro</strong> del Programa Empresarial. Nació gracias al sólido compromiso social de la <strong>Fundación J.Borja</strong> junto a la iniciativa de Empresas ADOC.</p>
                    <p>Su misión principal es transformar la vida de jóvenes de centros escolares públicos a través de una educación de alta calidad, dotándolos de un dominio avanzado del <strong>idioma inglés</strong> y de herramientas tecnológicas certificadas por **Microsoft**.</p>
                    <p>Hasta la fecha, este centro ha graduado a **cientos de alumnos**, abriéndoles las puertas a mejores oportunidades universitarias y empleos globales competitivos. El éxito de esta alianza radica en la firme convicción de que la educación con base en valores es el motor de desarrollo para las familias del país.</p>
                    <p>¡Lee con cuidado! Estos detalles del centro de Soyapango, sus fundadores y sus certificaciones son las llaves para resolver esta trivia.</p>
                </div>
                <button class="btn" onclick="startQuiz()">¡Listo, entendido!</button>
            </div>
        </div>

        <div id="screen-quiz" class="screen">
            <div class="progress-bar">Pregunta <span id="current-num">1</span> de 10</div>
            <div id="question-title" class="question-text">Cargando pregunta...</div>
            
            <div class="options-container" id="options-block">
                </div>

            <div id="feedback" class="feedback-message"></div>
            <button id="btn-next" class="btn" style="display: none;" onclick="nextQuestion()">Siguiente Pregunta ❯</button>
        </div>

        <div id="screen-results" class="screen">
            <div class="results-content">
                <h2>¡Misión Cumplida!</h2>
                <p>Has finalizado la Trivia oficial del Centro ¡Súpérate! ADOC.</p>
                
                <div class="score-circle">
                    <div id="final-score" class="score-num">0</div>
                    <div class="score-total">de 10</div>
                </div>

                <div id="rank-message" class="rank-text">Evaluando rango...</div>
                
                <a href="actividades.php" class="btn">Volver a Actividades</a>
            </div>
        </div>

    </div>

    <script src="js/triviasuperateadoc.js"></script>
</body>
</html>