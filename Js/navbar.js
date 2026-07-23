document.addEventListener("DOMContentLoaded", function () {

const frases = [
    
  { texto: "El futuro pertenece a quienes creen en la belleza de sus sueños.", autor: "— Eleanor Roosevelt" },
  { texto: "Cada día es una nueva oportunidad para aprender algo que cambie tu vida.", autor: "— Autor desconocido" },
  { texto: "La mente que se abre a una nueva idea jamás vuelve a su tamaño original.", autor: "— Albert Einstein" },
  { texto: "No importa lo lento que avances, siempre que no te detengas.", autor: "— Confucio" },
  { texto: "Nunca dejes de aprender, porque la vida nunca deja de enseñar.", autor: "— Autor desconocido" },
  { texto: "Tu futuro se construye con lo que haces hoy, no mañana.", autor: "— Inspirada en Robert Kiyosaki" },
  { texto: "El éxito no llega por suerte, llega por esfuerzo.", autor: "— Autor desconocido." },
  { texto: "La constancia siempre termina dando resultados.", autor: "— TheGrefg" },
  { texto: "Si puedes imaginarlo, puedes hacerlo realidad.", autor: "— Fernanfloo" },
  { texto: "Los grandes logros comienzan con la decisión de intentarlo.", autor: "— Autor desconocido" },
  { texto: "Aprender es el primer paso para transformar tus sueños en metas.", autor: "— Autor desconocido" },
  { texto: "Cada pequeño esfuerzo de hoy será una gran recompensa mañana.", autor: "— Autor desconocido" },
  { texto: "Confía en ti mismo; eres capaz de mucho más de lo que imaginas.", autor: "— Autor desconocido" },
  { texto: "El conocimiento es la brújula que guía el camino hacia el éxito.", autor: "— Inspirada en Francis Bacon" }
];

function mostrarFraseAleatoria() {

    const bancoFrases = {
        "index.php": [
            { texto: "Cada nuevo comienzo trae nuevas oportunidades.", autor: "— Freshman Compass" },
            { texto: "El futuro pertenece a quienes creen en la belleza de sus sueños.", autor: "— Eleanor Roosevelt" }
        ],

        "teachers.php": [
            
            { texto: "Dime y lo olvido, enséñame y lo recuerdo, involúcrame y lo aprendo.", autor: "— Benjamin Franklin" },
            { texto: "La mente que se abre a una nueva idea jamás vuelve a su tamaño original.", autor: "— Albert Einstein" },
            { texto: "Nunca dejes de aprender, porque la vida nunca deja de enseñar.", autor: "— Autor desconocido" }
        ],

        "consejos.php": [
            
            { texto: "La vida es lo que pasa mientras estás ocupado haciendo otros planes.", autor: "— John Lennon" },
            { texto: "Tu futuro se construye con lo que haces hoy, no mañana.", autor: "— Robert Kiyosaki" },
            { texto: "No dejes que nadie te diga que no puedes hacer algo.", autor: "— Will Smith" },
            { texto: "No importa lo lento que avances, siempre que no te detengas.", autor: "— Confucio" }
        ],

        "actividades.php": [
            { texto: "El éxito no llega por suerte, llega por esfuerzo.", autor: "— Autor desconocido" }
        ],

        "nuestro_centro.php": [
            { texto: "Todo parece imposible hasta que se hace.", autor: "— Nelson Mandela" },
            { texto: "El optimismo es la fe que conduce al logro.", autor: "— Helen Keller" },
            { texto: "Grandes historias comienzan en lugares inesperados.", autor: "— Autor desconocido" }
        ],

        "eventos.php": [
            { texto: "Algunos quieren que ocurra, otros hacen que ocurra.", autor: "— Michael Jordan" },
            { texto: "Disfruta el momento y colecciona recuerdos.", autor: "— Autor desconocido" }
        ],

        "default": [
            
            { texto: "Nunca dejes de aprender, porque la vida nunca deja de enseñar.", autor: "— Autor desconocido" }
        ]
    };

    const rutaAbsoluta = window.location.pathname;
    const paginaActual = rutaAbsoluta.substring(rutaAbsoluta.lastIndexOf('/') + 1);

    let listaDeFrases = bancoFrases[paginaActual] || bancoFrases["default"];

    const elTexto = document.getElementById("texto-frase");
    const elAutor = document.getElementById("autor-frase");

    if (elTexto && elAutor) {
        const indiceAleatorio = Math.floor(Math.random() * listaDeFrases.length);
        const fraseSeleccionada = listaDeFrases[indiceAleatorio];

        elTexto.textContent = fraseSeleccionada.texto;
        elAutor.textContent = fraseSeleccionada.autor;
    }
}

mostrarFraseAleatoria();

});