<<<<<<< HEAD
document.addEventListener("DOMContentLoaded", function () {
=======
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
  const elTexto = document.getElementById("texto-frase");
  const elAutor = document.getElementById("autor-frase");

  // 📌 Seguridad: Solo ejecuta si los elementos existen en la página actual
  if (elTexto && elAutor) {
    const indiceAleatorio = Math.floor(Math.random() * frases.length);
    const fraseSeleccionada = frases[indiceAleatorio];
>>>>>>> e3af0550987c04e13515bb504e8df2b369a4c6d0
    
    const bancoFrases = {
        "index.php": [
            { texto: "Cada nuevo comienzo trae nuevas oportunidades.", autor: "— Freshman Compass" },
            { texto: "No tengas miedo de empezar desde cero.", autor: "— Ibai Llanos" },
            { texto: "El futuro pertenece a quienes creen en la belleza de sus sueños.", autor: "— Eleanor Roosevelt" },
            { texto: "Si puedes imaginarlo, puedes hacerlo realidad.", autor: "— Fernanfloo" }
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
            { texto: "La constancia siempre termina dando resultados.", autor: "— TheGrefg" },
            { texto: "La clave es ser tú mismo y disfrutar el proceso.", autor: "— Ibai Llanos." },
            { texto: "El éxito no llega por suerte, llega por esfuerzo.", autor: "— Autor desconocido." },
            { texto: "El talento ayuda, pero la constancia marca la diferencia.", autor: "— TheGrefg" }
        ],
        "nuestro_centro.php": [
            { texto: "Todo parece imposible hasta que se hace.", autor: "— Nelson Mandela" },
             { texto: "El optimismo es la fe que conduce al logro.", autor: "— Helen Keller" },
            { texto: "Grandes historias comienzan en lugares inesperados.", autor: "— Autor desconocido" }
        ],
        "eventos.php": [
            { texto: "Cada día es una nueva oportunidad para mejorar.", autor: "— JuegaGerman" },
            { texto: "Algunos quieren que ocurra, otros hacen que ocurra", autor: "— Michael Jordan" },
            { texto: "Disfruta el momento y colecciona recuerdos.", autor: "— Autor desconocido" }
        ],
        // Frases de respaldo por si acaso no entra en ninguna categoría anterior
        "default": [
            { texto: "Nunca dejes de aprender, porque la vida nunca deja de enseñar.", autor: "— Autor desconocido" },
            { texto: "Si puedes imaginarlo, puedes hacerlo realidad.", autor: "— Fernanfloo" }
        ]
    };

    // 1. Obtener el nombre de la página actual desde la URL de la barra de navegación
    const rutaAbsoluta = window.location.pathname;
    const paginaActual = rutaAbsoluta.substring(rutaAbsoluta.lastIndexOf('/') + 1);

    // 2. Escoger la lista de frases según la página (o la de respaldo si no existe)
    let listaDeFrases = bancoFrases[paginaActual] || bancoFrases["default"];

    // 3. Seleccionar elementos del HTML
    const elTexto = document.getElementById("texto-frase");
    const elAutor = document.getElementById("autor-frase");

    // 4. Elegir una frase aleatoria de la lista seleccionada e inyectarla
    if (elTexto && elAutor) {
        const indiceAleatorio = Math.floor(Math.random() * listaDeFrases.length);
        const fraseSeleccionada = listaDeFrases[indiceAleatorio];
        
        elTexto.textContent = fraseSeleccionada.texto;
        elAutor.textContent = fraseSeleccionada.autor;
    }
});