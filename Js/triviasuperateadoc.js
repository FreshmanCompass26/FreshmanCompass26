const quizData = [
    {
        q: "¿Cuál es el objetivo principal del aprendizaje intensivo del inglés dentro del programa?",
        a: [
            "Preparar traductores profesionales",
            "Facilitar oportunidades académicas y laborales",
            "Reemplazar las materias escolares",
            "Promover únicamente intercambios estudiantiles"
        ],
        correct: 1
    },

    {
        q: "Según la lectura, la formación tecnológica busca que los estudiantes...",
        a: [
            "Se especialicen únicamente en programación",
            "Compitan en videojuegos",
            "Enfrenten los desafíos del mundo actual",
            "Trabajen exclusivamente en empresas tecnológicas"
        ],
        correct: 2
    },

    {
        q: "¿Qué conjunto de valores se menciona como parte fundamental de la formación del estudiante?",
        a: [
            "Disciplina, responsabilidad, perseverancia y liderazgo",
            "Creatividad, riqueza, innovación y popularidad",
            "Competitividad, velocidad y autonomía",
            "Obediencia, silencio y perfección"
        ],
        correct: 0
    },

    {
        q: "¿Por qué puede afirmarse que ¡Supérate! ADOC complementa la educación escolar?",
        a: [
            "Porque reemplaza las clases del instituto",
            "Porque ofrece formación adicional en áreas clave",
            "Porque reduce la carga académica",
            "Porque funciona como una universidad"
        ],
        correct: 1
    },

    {
        q: "¿Cuál de las siguientes habilidades favorece la colaboración entre estudiantes?",
        a: [
            "Memorización",
            "Trabajo en equipo",
            "Velocidad de escritura",
            "Competencia individual"
        ],
        correct: 1
    },

    {
        q: "Cuando la lectura menciona 'agentes de cambio', se refiere a estudiantes capaces de...",
        a: [
            "Modificar sistemas informáticos",
            "Influir positivamente en su entorno",
            "Dirigir empresas multinacionales",
            "Trabajar únicamente como líderes políticos"
        ],
        correct: 1
    },

    {
        q: "¿Qué relación existe entre la perseverancia y el éxito dentro del programa?",
        a: [
            "No tienen relación",
            "La perseverancia ayuda a superar retos y alcanzar metas",
            "La perseverancia sustituye el esfuerzo",
            "Solo es importante durante el primer año"
        ],
        correct: 1
    },

    {
        q: "¿Cuál de las siguientes acciones refleja mejor los valores promovidos por el programa?",
        a: [
            "Ignorar responsabilidades académicas",
            "Cumplir compromisos y ayudar a otros",
            "Trabajar únicamente por beneficio propio",
            "Evitar nuevos desafíos"
        ],
        correct: 1
    },

    {
        q: "¿Cuál es una consecuencia esperada de la formación recibida en ¡Supérate! ADOC?",
        a: [
            "Dependencia de los docentes",
            "Mayor preparación para el futuro",
            "Menor participación comunitaria",
            "Reducción de metas personales"
        ],
        correct: 1
    },

    {
        q: "¿Qué idea resume mejor el mensaje principal de la lectura?",
        a: [
            "La educación transforma vidas cuando se combina con valores y oportunidades",
            "El inglés es más importante que cualquier otra materia",
            "La tecnología garantiza el éxito sin esfuerzo",
            "Los estudiantes deben enfocarse únicamente en obtener empleo"
        ],
        correct: 0
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

    document.getElementById('current-num').innerText =
        currentQuestionIndex + 1;

    document.getElementById('question-title').innerText =
        currentQuestion.q;

    const optionsBlock =
        document.getElementById('options-block');

    optionsBlock.innerHTML = '';

    currentQuestion.a.forEach((option, index) => {

        const button = document.createElement('button');

        button.className = 'option-btn';
        button.innerText = option;

        button.onclick = () =>
            selectAnswer(index, button);

        optionsBlock.appendChild(button);
    });
}

function selectAnswer(selectedIndex, selectedButton) {

    const currentQuestion =
        quizData[currentQuestionIndex];

    const allButtons =
        document.querySelectorAll('.option-btn');

    const feedback =
        document.getElementById('feedback');

    allButtons.forEach(btn => btn.disabled = true);

    if (selectedIndex === currentQuestion.correct) {

        selectedButton.classList.add('correct');
        score++;

        const audioCorrecto =
            new Audio('audio/correcto.mp3');

        audioCorrecto.volume = 0.5;
        audioCorrecto.currentTime = 0.2;

        audioCorrecto.play()
            .catch(e => console.log("Audio bloqueado:", e));

        const correctMsgs = [
            "¡Excelente! Sigue así",
            "¡Qué pro! Totalmente correcto ",
            "¡Así es! Vas por buen camino ",
            "¡Muy bien! Conoces bastante del programa ",
            "¡Respuesta correcta! "
        ];

        feedback.innerText =
            correctMsgs[Math.floor(
                Math.random() * correctMsgs.length
            )];

        feedback.classList.add('correct');

    } else {

        selectedButton.classList.add('wrong');

        allButtons[currentQuestion.correct]
            .classList.add('correct');

        const audioError =
            new Audio('audio/error.mp3');

        audioError.volume = 0.5;
        audioError.currentTime = 0.2;

        audioError.play()
            .catch(e => console.log("Audio bloqueado:", e));

        feedback.innerText =
            "Ups, esa no era la respuesta correcta ";

        feedback.classList.add('wrong');
    }

    document.getElementById('btn-next').style.display =
        'inline-block';
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

    changeScreen(
        'screen-quiz',
        'screen-results'
    );

    localStorage.setItem(
        'triviaSuperateAdocCompletada',
        'true'
    );

    localStorage.setItem(
        'triviaSuperateAdocScore',
        score
    );

    const scoreElement =
        document.getElementById('final-score');

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

    const rankMessage =
        document.getElementById('rank-message');

    if (score === 10) {

        rankMessage.innerText =
            " ¡Nivel Experto! Dominas completamente la información de ¡Supérate! ADOC.";
        rankMessage.style.color =
            "var(--success)";

    } else if (score >= 8) {

        rankMessage.innerText =
            "¡Excelente trabajo! Tienes un conocimiento muy sólido del programa.";
        rankMessage.style.color =
            "var(--primary)";

    } else if (score >= 6) {

        rankMessage.innerText =
            " Buen intento. Conoces bastante, pero aún puedes mejorar.";
        rankMessage.style.color =
            "#f39c12";

    } else {

        rankMessage.innerText =
            " Sigue aprendiendo sobre ¡Supérate! ADOC y vuelve a intentarlo.";
        rankMessage.style.color =
            "#e67e22";
    }
}