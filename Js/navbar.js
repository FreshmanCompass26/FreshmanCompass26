const frases = [
  { texto: "El futuro pertenece a quienes creen en la belleza de sus sueños.", autor: "— Eleanor Roosevelt" },
  { texto: "Cada día es una nueva oportunidad para aprender algo que cambie tu vida.", autor: "— Autor desconocido" },
  { texto: "La mente que se abre a una nueva idea jamás vuelve a su tamaño original.", autor: "— Albert Einstein" },
  { texto: "No importa lo lento que avances, siempre que no te detengas.", autor: "— Confucio" },
  { texto: "Nunca dejes de aprender, porque la vida nunca deja de enseñar.", autor: "— Autor desconocido" },
  { texto: "Tu futuro se construye con lo que haces hoy, no mañana.", autor: "— Inspirada en Robert Kiyosaki" },
  { texto: "El éxito no llega por suerte, llega por esfuerzo.", autor: "— Autor desconocido." },
  { texto: "La constancia siempre termina dando resultados.", autor: "— TheGrefg" },
  { texto: "Si puedes imaginarlo, puedes hacerlo realidad.", autor: "— Fernanfloo" }
];

function mostrarFraseAleatoria() {
  const elTexto = document.getElementById("texto-frase");
  const elAutor = document.getElementById("autor-frase");

  // 📌 Seguridad: Solo ejecuta si los elementos existen en la página actual
  if (elTexto && elAutor) {
    const indiceAleatorio = Math.floor(Math.random() * frases.length);
    const fraseSeleccionada = frases[indiceAleatorio];
    
    elTexto.textContent = fraseSeleccionada.texto; // Usamos textContent por seguridad
    elAutor.textContent = fraseSeleccionada.autor;
  }
}

// Ejecuta cuando el HTML esté completamente cargado
window.addEventListener('DOMContentLoaded', mostrarFraseAleatoria);