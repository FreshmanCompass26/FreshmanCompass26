const quizData = [
    {
        q: "¿En qué año nació el Programa Empresarial ¡Supérate!?",
        a: ["2004", "2010", "1998", "2015"],
        correct: 0
    },
    {
        q: "¿Cuáles son las tres áreas principales de estudio en ¡Supérate!?",
        a: [
            "Matemáticas, Ciencias y Lenguaje",
            "Inglés, Informática y Valores",
            "Programación, Diseño y Oratoria",
            "Contabilidad, Inglés y Administración"
        ],
        correct: 1
    },
    {
        q: "¿Cuánto dura aproximadamente el Programa ¡Supérate!?",
        a: [
            "1 año",
            "2 años",
            "3 años",
            "5 años"
        ],
        correct: 2
    },
    {
        q: "¿Qué examen internacional certifica el nivel de inglés de los estudiantes de ¡Supérate!?",
        a: [
            "TOEFL",
            "IELTS",
            "TOEIC",
            "Cambridge PET"
        ],
        correct: 2
    },
    {
        q: "¿Qué empresa certifica las habilidades de informática de los estudiantes?",
        a: [
            "Google",
            "Apple",
            "Microsoft",
            "Oracle"
        ],
        correct: 2
    },
    {
        q: "¿Durante qué etapa educativa cursan normalmente los estudiantes el programa?",
        a: [
            "Educación Básica",
            "Universidad",
            "Noveno y Bachillerato",
            "Posgrado"
        ],
        correct: 2
    },
    {
        q: "¿Qué significa que el Programa ¡Supérate! sea una formación complementaria?",
        a: [
            "Que sustituye las clases del colegio.",
            "Que solo funciona en vacaciones.",
            "Que se desarrolla fuera del horario escolar para reforzar la formación del estudiante.",
            "Que solo ofrece clases en línea."
        ],
        correct: 2
    },
    {
        q: "¿Cuál de las siguientes habilidades también promueve el Programa ¡Supérate!?",
        a: [
            "Programación avanzada",
            "Liderazgo",
            "Diseño gráfico",
            "Marketing digital"
        ],
        correct: 1
    },
    {
        q: "¿Además del liderazgo, qué otra habilidad menciona el programa como parte de la formación integral?",
        a: [
            "Comunicación efectiva",
            "Edición de video",
            "Diseño web",
            "Fotografía"
        ],
        correct: 0
    },
    {
        q: "¿Qué oportunidades obtienen muchos graduados gracias a su formación en ¡Supérate!?",
        a: [
            "Participar únicamente en competencias deportivas",
            "Crear empresas automáticamente",
            "Becas universitarias y mejores oportunidades académicas y laborales",
            "Trabajar únicamente en el extranjero"
        ],
        correct: 2
    }
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
        
        //Audio Éxito
        const audioCorrecto = new Audio('audio/correcto.mp3');
        audioCorrecto.volume = 0.5;
        audioCorrecto.play().catch(e => console.log("Audio bloqueado:", e));

        const correctMsgs = ["¡Excelente! Sigue así", "¡Qué pro! Totalmente correcto", "¡Así es! Vas por buen camino"];
        feedback.innerText = correctMsgs[Math.floor(Math.random() * correctMsgs.length)];
        feedback.classList.add('correct');
    } else {
        selectedButton.classList.add('wrong');
        allButtons[currentQuestion.correct].classList.add('correct');
        
        //Audio Error
        const audioError = new Audio('audio/error.mp3');
        audioError.volume = 0.5;
        audioError.play().catch(e => console.log("Audio bloqueado:", e));

        feedback.innerText = "Ups, esa no era la correcta...  Suerte en la próxima";
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
    
    localStorage.setItem('triviaSuperateCompletada', 'true');
    localStorage.setItem('triviaSuperateScore', score);

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
        rankMessage.innerText = "¡Nivel Dios! Un verdadero Freshman de ¡Súpérate! ";
        rankMessage.style.color = "var(--success)";
    } else if (score >= 7) {
        rankMessage.innerText = "¡Puntaje Intermedio/Alto! Estás súper listo.";
        rankMessage.style.color = "var(--primary)";
    } else {
        rankMessage.innerText = "Score Básico/Normal. ¡Puedes volver a repasar la info!";
        rankMessage.style.color = "#e67e22";
    }
}   