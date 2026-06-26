<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trivia ¡Súpérate! - FreshmanCompass</title>
    <!-- Vinculamos tu archivo CSS separado -->
    <link rel="stylesheet" href="styles/triviasp.css">
</head>
<body>

    <div class="game-box">

        <!-- PANTALLA 1: ANIMACIÓN DE INICIO / CARGA -->
        <div id="screen-loading" class="screen active">
            <div class="loader-content">
                <h1>Trivia ¡Súpérate!</h1>
                <p>Preparando tu misión... ¡Prepárate!</p>
                <div class="spinner"></div>
            </div>
        </div>

        <!-- PANTALLA 2: LECTURA DE INFORMACIÓN -->
        <div id="screen-info" class="screen">
            <div class="info-content">
                <h2>¿Qué es ¡Súpérate!?</h2>
                <div class="info-text">
                    <p>El Programa Empresarial ¡Súpérate! nació en el año 2004 gracias a la iniciativa de la Fundación Sagrera Palomo y empresas aliadas como una oportunidad de transformación social.</p>
                    <p>Su objetivo clave es capacitar a jóvenes de alto rendimiento a través de una beca de tres años en áreas críticas: <strong>Inglés avanzado, Informática y Formación en Valores</strong>. Al finalizar, estarás completamente listo para destacar en el mundo universitario y profesional.</p>
                    <p>¡Presta mucha atención! Toda esta cultura, sus pilares y su trayectoria son la base para desbloquear el éxito en las siguientes dinámicas.</p>
                </div>
                <button class="btn" onclick="startQuiz()">¡Listo, entendido!</button>
            </div>
        </div>

        <!-- PANTALLA 3: EL JUEGO (PREGUNTAS) -->
        <div id="screen-quiz" class="screen">
            <div class="progress-bar">Pregunta <span id="current-num">1</span> de 10</div>
            <div id="question-title" class="question-text">Cargando pregunta...</div>
            
            <div class="options-container" id="options-block">
                <!-- Se generan dinámicamente con JS -->
            </div>

            <div id="feedback" class="feedback-message"></div>
            <button id="btn-next" class="btn" style="display: none;" onclick="nextQuestion()">Siguiente Pregunta ❯</button>
        </div>

        <!-- PANTALLA 4: RESULTADOS FINALES -->
        <div id="screen-results" class="screen">
            <div class="results-content">
                <h2>¡Misión Cumplida!</h2>
                <p>Has finalizado la Trivia oficial de ¡Súpérate!.</p>
                
                <div class="score-circle">
                    <div id="final-score" class="score-num">0</div>
                    <div class="score-total">de 10</div>
                </div>

                <div id="rank-message" class="rank-text">Evaluando rango...</div>
                
                <!-- Ajusta este enlace al nombre exacto de tu archivo principal -->
                <a href="actividades.php" class="btn">Volver a Actividades 🏠</a>
            </div>
        </div>

    </div>

    <!-- Vinculamos tu archivo JS separado -->
    <script src="js/triviasp.js"></script>
</body>
</html>