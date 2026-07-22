<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trivia ¡Súpérate!</title>
    <link rel="icon" type="favicon" href="img/favicon.png">

<link rel="stylesheet" href="styles/triviasp.css">
</head>
<body>

    <a href="javascript:history.back()" class="btn-regresar">
    <i class="fa-solid fa-arrow-left"></i>
    <span>Regresar</span>
</a>

    <div class="game-box">

        <div id="screen-loading" class="screen active">
            <div class="loader-content">
                <h1>Trivia ¡Súpérate!</h1>
                <p>Preparando tu misión... ¡Prepárate!</p>
                <div class="spinner"></div>
            </div>
        </div>

        <div id="screen-info" class="screen">
            <div class="info-content">
                <h2>¿Qué es ¡Súpérate!?</h2>
               <div class="info-text">
    <p>El <strong>Programa Empresarial ¡Supérate!</strong> nació en el año <strong>2004</strong> con el propósito de brindar oportunidades de formación a jóvenes destacados de centros escolares públicos en El Salvador.</p>

    <p>El programa ofrece una beca de aproximadamente <strong>tres años</strong>, durante la cual los estudiantes reciben una educación complementaria en <strong>Inglés, Informática y Formación en Valores</strong>, asistiendo a clases fuera de su horario escolar mientras cursan el noveno grado y bachillerato.</p>

    <p>Además de fortalecer los conocimientos académicos, ¡Supérate! desarrolla habilidades como el <strong>liderazgo</strong>, la <strong>responsabilidad</strong>, el <strong>trabajo en equipo</strong> y la <strong>comunicación efectiva</strong>. Al finalizar, los estudiantes pueden obtener certificaciones internacionales como <strong>TOEIC</strong> en inglés y <strong>Microsoft</strong> en informática, abriendo las puertas a becas universitarias y mejores oportunidades académicas y laborales.</p>

    <p><strong>¡Lee con atención!</strong> La información presentada será clave para responder correctamente las preguntas de la siguiente trivia. ¡Demuestra cuánto aprendiste sobre el Programa Empresarial ¡Supérate!!</p>
</div>
                <button class="btn" onclick="startQuiz()">¡Listo, entendido!</button>
            </div>
        </div>

        <div id="screen-quiz" class="screen">
            <div class="progress-bar">Pregunta <span id="current-num">1</span> de 10</div>
            <div id="question-title" class="question-text">Cargando pregunta...</div>
            
            <div class="options-container" id="options-block">
                <!-- Se generan dinámicamente con JS -->
            </div>

            <div id="feedback" class="feedback-message"></div>
            <button id="btn-next" class="btn" style="display: none;" onclick="nextQuestion()">Siguiente Pregunta ❯</button>
        </div>

        <div id="screen-results" class="screen">
            <div class="results-content">
                <h2>¡Misión Cumplida!</h2>
                <p>Has finalizado la Trivia oficial de ¡Súpérate!.</p>
                
                <div class="score-circle">
                    <div id="final-score" class="score-num">0</div>
                    <div class="score-total">de 10</div>
                </div>

                <div id="rank-message" class="rank-text">Evaluando rango...</div>
                
                <a href="actividades.php" class="btn">Volver a Actividades</a>
            </div>
        </div>

    </div>

    <script src="js/triviasp.js"></script>
</body>
</html>