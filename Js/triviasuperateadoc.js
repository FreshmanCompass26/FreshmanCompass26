const quizData = [
    { q: "¿En qué año abrió sus puertas el Centro ¡Súpérate! ADOC?", a: ["2004", "2006", "2008", "2012"], correct: 2 },
    { q: "¿En qué municipio de El Salvador se encuentra ubicado este centro?", a: ["Santa Tecla", "Soyapango", "San Miguel", "Santa Ana"], correct: 1 },
    { q: "El Centro ¡Súpérate! ADOC fue el... número del programa empresarial:", a: ["Primer centro", "Segundo centro", "Tercer centro", "Quinto centro"], correct: 1 },
    { q: "¿Qué fundación unió esfuerzos con Empresas ADOC para hacer realidad este centro?", a: ["Fundación Poma", "Fundación Slim", "Fundación J.Borja", "Fundación Sagrera Palomo"], correct: 2 },
    { q: "¿De qué tipo de instituciones provienen los jóvenes beneficiados por este programa?", a: ["Centros escolares públicos", "Colegios privados bilingües", "Institutos universitarios", "Escuelas técnicas internacionales"], correct: 0 },
    { q: "¿Cuál es uno de los componentes clave de la educación que se imparte en el centro?", a: ["Diseño industrial de calzado", "Dominio avanzado del idioma inglés", "Mantenimiento de maquinaria", "Administración hotelera"], correct: 1 },
    { q: "¿Qué empresa internacional certifica las herramientas tecnológicas de los estudiantes?", a: ["Google", "Apple", "Microsoft", "Oracle"], correct: 2 },
    { q: "Según el texto, ¿a cuántos alumnos ha graduado este centro hasta la fecha?", a: ["A decenas de alumnos", "A cientos de alumnos", "A miles de alumnos", "A un grupo selecto de 20 jóvenes"], correct: 1 },
    { q: "Al graduarse, ¿hacia qué áreas se les abren mejores oportunidades a los jóvenes?", a: ["Viajes turísticos de intercambio", "Mercados universitarios y empleos globales", "Puestos políticos", "Competiciones deportivas"], correct: 1 },
    { q: "Según la lectura, ¿cuál es el motor de desarrollo para las familias del país?", a: ["La automatización industrial", "La educación con base en valores", "La apertura de nuevas tiendas", "El marketing digital"], correct: 1 }
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
        
        // 🔊 Audio Éxito sin lag
        const audioCorrecto = new Audio('audio/correcto.mp3');
        audioCorrecto.volume = 0.5;
        audioCorrecto.currentTime = 0.2;
        audioCorrecto.play().catch(e => console.log("Audio bloqueado:", e));

        const correctMsgs = ["¡Excelente! Sigue así ⚡", "¡Qué pro! Totalmente correcto ⭐", "¡Así es! Vas por buen camino 🎯"];
        feedback.innerText = correctMsgs[Math.floor(Math.random() * correctMsgs.length)];
        feedback.classList.add('correct');
    } else {
        selectedButton.classList.add('wrong');
        allButtons[currentQuestion.correct].classList.add('correct');
        
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
    
    // Guardado exclusivo independiente para la alianza ¡Súpérate! ADOC
    localStorage.setItem('triviaSuperateAdocCompletada', 'true');
    localStorage.setItem('triviaSuperateAdocScore', score);

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
        rankMessage.innerText = "¡Nivel Dios! Un verdadero erudito del centro de Soyapango 🏆";
        rankMessage.style.color = "var(--success)";
    } else if (score >= 7) {
        rankMessage.innerText = "¡Puntaje Alto! Conoces muy bien la trayectoria de esta alianza.";
        rankMessage.style.color = "var(--primary)";
    } else {
        rankMessage.innerText = "Score Básico. ¡Puedes volver a darle un repaso a la historia!";
        rankMessage.style.color = "#e67e22";
    }
}