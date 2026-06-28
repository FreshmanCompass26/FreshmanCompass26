const quizData = [
    { q: "¿En qué año fue fundada la empresa ADOC?", a: ["1945", "1953", "1968", "1980"], correct: 1 },
    { q: "¿Quién fue el fundador de Empresas ADOC?", a: ["Don Roberto Palomo", "Don Alfredo Sagrera", "Don Ricardo Poma", "Don Luis Poma"], correct: 0 },
    { q: "¿En qué país centroamericano nació y se fundó ADOC?", a: ["Guatemala", "Honduras", "El Salvador", "Costa Rica"], correct: 2 },
    { q: "Según el texto, ¿cuál fue el sueño inicial al fundar ADOC?", a: ["Exportar calzado a Europa", "Calzar a las familias centroamericanas con calidad y durabilidad", "Vender calzado de marcas internacionales", "Fabricar maquinaria pesada"], correct: 1 },
    { q: "ADOC es considerada actualmente como la empresa de calzado más grande de:", a: ["El Salvador solamente", "Latinoamérica", "Centroamérica", "El Caribe"], correct: 2 },
    { q: "¿Cómo se llama la famosa marca de botas industriales de alta resistencia creada por ADOC?", a: ["Caterpillar", "Rhino", "Timber", "Trooper"], correct: 1 },
    { q: "¿Cuáles son los tres pilares fundamentales que sostienen la cultura de ADOC?", a: ["Eficiencia, Rapidez y Economía", "Innovación, Puntualidad y Respeto", "Integridad, Trabajo en Equipo y Pasión", "Calidad, Garantía y Liderazgo"], correct: 2 },
    { q: "Además del calzado, ¿en qué áreas enfoca ADOC su apoyo social activo?", a: ["Deportes extremos", "Desarrollo social y educativo de las comunidades", "Construcción de carreteras", "Financiamiento de startups"], correct: 1 },
    { q: "La marca de botas Rhino destaca en el mercado por su:", a: ["Bajo precio", "Resistencia extrema", "Variedad de modas de tela", "Diseño ultra liviano"], correct: 1 },
    { q: "Según los pilares de la empresa, ¿hacia qué está dirigida su enorme Pasión?", a: ["Hacia el marketing digital", "Hacia el servicio al cliente", "Hacia la automatización", "Hacia la competencia internacional"], correct: 1 }
];

let currentQuestionIndex = 0;
let score = 0;

setTimeout(() => {
    changeScreen('screen-loading', 'screen-info');
}, 2500);

function changeScreen(hideId, showId) {
    document.getElementById(hideId).classList.remove('active');
    document.getElementById(showId).classList.add('active');
}

function startQuiz() {
    changeScreen('screen-info', 'screen-quiz');
    loadQuestion();
}

function loadQuestion() {
    document.getElementById('btn-next').style.display = 'none';
    const feedback = document.getElementById('feedback');
    feedback.innerHTML = '';
    feedback.className = 'feedback-message';

    const currentQuestion = quizData[currentQuestionIndex];
    
    document.getElementById('current-num').innerText = currentQuestionIndex + 1;
    document.getElementById('question-title').innerText = currentQuestion.q;

    const optionsBlock = document.getElementById('options-block');
    optionsBlock.innerHTML = '';

    currentQuestion.a.forEach((option, index) => {
        const button = document.createElement('button');
        button.className = 'option-btn';
        button.innerText = option;
        button.onclick = () => selectAnswer(index, button);
        optionsBlock.appendChild(button);
    });
}

function selectAnswer(selectedIndex, selectedButton) {
    const currentQuestion = quizData[currentQuestionIndex];
    const allButtons = document.querySelectorAll('.option-btn');
    const feedback = document.getElementById('feedback');

    allButtons.forEach(btn => btn.disabled = true);

    if (selectedIndex === currentQuestion.correct) {
        selectedButton.classList.add('correct');
        score++;
        
        // Audio Éxito con fix de retraso
        const audioCorrecto = new Audio('audio/correcto.mp3');
        audioCorrecto.volume = 0.5;
        audioCorrecto.currentTime = 0.2;
        audioCorrecto.play().catch(e => console.log("Audio bloqueado:", e));

        const correctMsgs = ["¡Excelente! Gran lectura ⚡", "¡Puntazo! Todo correcto", "¡Así es! Buena memoria"];
        feedback.innerText = correctMsgs[Math.floor(Math.random() * correctMsgs.length)];
        feedback.classList.add('correct');
    } else {
        selectedButton.classList.add('wrong');
        allButtons[currentQuestion.correct].classList.add('correct');
        
        // Audio Error con fix de retraso
        const audioError = new Audio('audio/error.mp3');
        audioError.volume = 0.5;
        audioError.currentTime = 0.2;
        audioError.play().catch(e => console.log("Audio bloqueado:", e));

        feedback.innerText = "Ups, esa no era la correcta... Suerte en la próxima";
        feedback.classList.add('wrong');
    }

    document.getElementById('btn-next').style.display = 'inline-block';
}

function nextQuestion() {
    currentQuestionIndex++;
    if (currentQuestionIndex < quizData.length) {
        loadQuestion();
    } else {
        showFinalResults();
    }
}

function showFinalResults() {
    changeScreen('screen-quiz', 'screen-results');
    
    // Guardado exclusivo para ADOC
    localStorage.setItem('triviaAdocCompletada', 'true');
    localStorage.setItem('triviaAdocScore', score);

    const scoreElement = document.getElementById('final-score');
    let currentCount = 0;
    
    if (score > 0) {
        let counterInterval = setInterval(() => {
            currentCount++;
            scoreElement.innerText = currentCount;
            if (currentCount >= score) {
                clearInterval(counterInterval);
            }
        }, 80);
    } else {
        scoreElement.innerText = 0;
    }

    const rankMessage = document.getElementById('rank-message');
    if (score === 10) {
        rankMessage.innerText = "¡Nivel Experto! Conoces perfectamente la historia de ADOC 🏆";
        rankMessage.style.color = "var(--success)";
    } else if (score >= 7) {
        rankMessage.innerText = "¡Buen puntaje! Conoces los pilares clave de la empresa.";
        rankMessage.style.color = "var(--primary)";
    } else {
        rankMessage.innerText = "Score Básico. ¡Puedes volver a repasar la info cuando quieras!";
        rankMessage.style.color = "#e67e22";
    }
}