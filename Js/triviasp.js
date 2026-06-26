// Banco de datos con las 10 preguntas fijas de la trivia
const quizData = [
    { q: "¿En qué año nació el Programa Empresarial ¡Súpérate!?", a: ["2004", "2010", "1998", "2015"], correct: 0 },
    { q: "¿Cuáles son las tres áreas principales de estudio en ¡Súpérate!?", a: ["Matemáticas, Ciencias y Lenguaje", "Inglés, Informática y Valores", "Programación, Diseño y Oratoria", "Contabilidad, Inglés y Administración"], correct: 1 },
    { q: "¿Cuántos años dura la beca del programa para un estudiante?", a: ["1 año", "2 años", "3 años", "5 años"], correct: 2 },
    { q: "¿Qué fundación inició el primer centro ¡Súpérate!?", a: ["Fundación ADOC", "Fundación Sagrera Palomo", "Fundación Poma", "Fundación Slim"], correct: 1 },
    { q: "¿Cuál es uno de los propósitos fundamentales del programa?", a: ["Regalar computadoras", "Transformar vidas a través de la educación", "Dar empleo directo", "Hacer torneos deportivos"], correct: 1 },
    { q: "Además de lo académico, ¿qué aspecto busca fortalecer el programa?", a: ["La velocidad al escribir", "La formación en Valores y liderazgo", "El uso de redes sociales", "Aprender a programar videojuegos"], correct: 1 },
    { q: "¿A quiénes está dirigido principalmente el programa de becas?", a: ["Jóvenes de centros escolares públicos con alto rendimiento", "Estudiantes universitarios de último año", "Profesionales graduados", "Niños de kínder"], correct: 0 },
    { q: "Al completar el programa, los estudiantes obtienen certificaciones internacionales en:", a: ["Solo asistencia", "Inglés e Informática (Microsoft/TOEIC)", "Diseño Gráfico", "Mantenimiento de Redes"], correct: 1 },
    { q: "What does the program name suggest?", a: ["Una invitación a superar retos y crecer constantemente", "Una marca de útiles escolares", "Un término exclusivo de programación", "Ganar una competencia deportiva"], correct: 0 },
    { q: "¿Cómo se le conoce al evento donde los estudiantes exponen sus proyectos tecnológicos?", a: ["InterCentros", "Expo Tech", "Grammar Fair", "Valores Fest"], correct: 1 }
];

let currentQuestionIndex = 0;
let score = 0;

// Temporizador inicial: 2.5 segundos de carga y cambia a la Pantalla de Información
setTimeout(() => {
    changeScreen('screen-loading', 'screen-info');
}, 2500);

// Cambiador de pantallas aplicando las clases CSS
function changeScreen(hideId, showId) {
    document.getElementById(hideId).classList.remove('active');
    document.getElementById(showId).classList.add('active');
}

// Iniciar cuestionario al presionar el botón de entendido
function startQuiz() {
    changeScreen('screen-info', 'screen-quiz');
    loadQuestion();
}

// Carga la pregunta actual en la interfaz
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

    // Creación de botones para las respuestas
    currentQuestion.a.forEach((option, index) => {
        const button = document.createElement('button');
        button.className = 'option-btn';
        button.innerText = option;
        button.onclick = () => selectAnswer(index, button);
        optionsBlock.appendChild(button);
    });
}

// Lógica al seleccionar una respuesta
function selectAnswer(selectedIndex, selectedButton) {
    const currentQuestion = quizData[currentQuestionIndex];
    const allButtons = document.querySelectorAll('.option-btn');
    const feedback = document.getElementById('feedback');

    // Deshabilita los botones inmediatamente para evitar cambios
    allButtons.forEach(btn => btn.disabled = true);

    if (selectedIndex === currentQuestion.correct) {
        selectedButton.classList.add('correct');
        score++;
        
        const correctMsgs = ["¡Excelente! Sigue así ⚡", "¡Qué pro! Totalmente correcto ⭐", "¡Así es! Vas por buen camino 🎯"];
        feedback.innerText = correctMsgs[Math.floor(Math.random() * correctMsgs.length)];
        feedback.classList.add('correct');
    } else {
        selectedButton.classList.add('wrong');
        // Pone en verde la correcta para retroalimentación
        allButtons[currentQuestion.correct].classList.add('correct');
        
        feedback.innerText = "Ups, esa no era la correcta... 🚀 Suerte en la próxima";
        feedback.classList.add('wrong');
    }

    document.getElementById('btn-next').style.display = 'inline-block';
}

// Avanza a la siguiente pregunta o finaliza
function nextQuestion() {
    currentQuestionIndex++;
    
    if (currentQuestionIndex < quizData.length) {
        loadQuestion();
    } else {
        showFinalResults();
    }
}

// Muestra la pantalla de score final evaluando el puntaje, animando el contador y guardando localmente
function showFinalResults() {
    changeScreen('screen-quiz', 'screen-results');
    
    // 1. GUARDADO LOCAL: Almacenamos el score para usarlo en actividades.php
    localStorage.setItem('triviaSuperateCompletada', 'true');
    localStorage.setItem('triviaSuperateScore', score);

    // 2. CONTADOR ANIMADO: El número sube de forma interactiva
    const scoreElement = document.getElementById('final-score');
    let currentCount = 0;
    
    if (score > 0) {
        let counterInterval = setInterval(() => {
            currentCount++;
            scoreElement.innerText = currentCount;
            
            if (currentCount >= score) {
                clearInterval(counterInterval); // Se detiene cuando llega al puntaje real
            }
        }, 80); // Velocidad del contador (en milisegundos)
    } else {
        scoreElement.innerText = 0;
    }

    // 3. Evaluar rango y mostrar mensajes chivos
    const rankMessage = document.getElementById('rank-message');
    if (score === 10) {
        rankMessage.innerText = "¡Nivel Dios! Un verdadero Freshman de ¡Súpérate! 🏆";
        rankMessage.style.color = "var(--success)";
    } else if (score >= 7) {
        rankMessage.innerText = "¡Puntaje Intermedio/Alto! Estás súper listo. 👍";
        rankMessage.style.color = "var(--primary)";
    } else {
        rankMessage.innerText = "Score Básico/Normal. ¡Puedes volver a repasar la info! 💪";
        rankMessage.style.color = "#e67e22";
    }
}