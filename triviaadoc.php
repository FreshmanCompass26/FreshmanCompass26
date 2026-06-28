<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trivia ADOC</title>
    <link rel="stylesheet" href="styles/triviasp.css">
</head>
<body>

    <div class="game-box">

        <!-- PANTALLA 1: ANIMACIÓN DE INICIO / CARGA -->
        <div id="screen-loading" class="screen active">
            <div class="loader-content">
                <h1>Trivia ADOC</h1>
                <p>Preparando tu misión... ¡Prepárate!</p>
                <div class="spinner"></div>
            </div>
        </div>

        <!-- PANTALLA 2: LECTURA DE INFORMACIÓN -->
        <div id="screen-info" class="screen">
            <div class="info-content">
                <h2>¿Qué es Empresas ADOC?</h2>
                <div class="info-text">
                    <p>Empresas ADOC fue fundada en el año <strong>1953</strong> en El Salvador por <strong>Don Roberto Palomo</strong>. Nació con el sueño de calzar a las familias centroamericanas con productos de excelente calidad y alta durabilidad.</p>
                    <p>Con el paso del tiempo, se convirtió en la empresa de calzado más grande de toda <strong>Centroamérica</strong>, operando fábricas propias y una enorme cadena de tiendas. Además de fabricar zapatos casuales, creó la legendaria marca de botas industriales <strong>Rhino</strong>, famosa por su resistencia extrema.</p>
                    <p>La cultura de ADOC se sostiene sobre tres pilares fundamentales: la <strong>Integridad</strong>, el <strong>Trabajo en Equipo</strong> y una enorme <strong>Pasión</strong> por servir al cliente. Su compromiso va más allá del negocio, apoyando activamente el desarrollo social y educativo de las comunidades.</p>
                    <p>¡Presta mucha atención! Toda esta historia, sus marcas clave y sus valores son las respuestas para superar con éxito la trivia a continuación.</p>
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
                <p>Has finalizado la Trivia oficial de Empresas ADOC.</p>
                
                <div class="score-circle">
                    <div id="final-score" class="score-num">0</div>
                    <div class="score-total">de 10</div>
                </div>

                <div id="rank-message" class="rank-text">Evaluando rango...</div>
                
                <a href="actividades.php" class="btn">Volver a Actividades 🏠</a>
            </div>
        </div>

    </div>

    <script src="js/triviaadoc.js"></script>
</body>
</html>