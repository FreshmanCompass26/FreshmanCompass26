document.addEventListener("DOMContentLoaded", function() {

    // ==========================================
    // 1. MÚSICA DE FONDO INTERACTIVA
    // ==========================================
    const musicaFondo = new Audio('audio/fondo.mp3');
    musicaFondo.loop = true;  // Hace que la canción se repita infinitamente
    musicaFondo.volume = 0.15; // Volumen sutil (15%) para que no sature el ambiente

    // Función para arrancar la música una vez que el usuario interactúe con la web
    function iniciarMusica() {
        musicaFondo.play()
            .then(() => {
                // Al reproducirse con éxito, quitamos los listeners para evitar duplicados
                document.removeEventListener('click', iniciarMusica);
                document.removeEventListener('scroll', iniciarMusica);
            })
            .catch(error => {
                console.log("Esperando interacción real del usuario para activar audio de fondo:", error);
            });
    }

    // Escuchamos el primer clic o scroll del usuario en la pantalla principal
    document.addEventListener('click', iniciarMusica);
    document.addEventListener('scroll', iniciarMusica);


    // ==========================================
    // 2. EFECTO ANIMACIÓN AL HACER SCROLL (SHOW)
    // ==========================================
    const cards = document.querySelectorAll(".card");

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show");
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    cards.forEach(card => {
        observer.observe(card);
    });


    // ==========================================
    // 3. DETECTOR DE RECORD PARA TRIVIA SÚPERATE
    // ==========================================
    const completado = localStorage.getItem('triviaSuperateCompletada');
    const puntajeMaximo = localStorage.getItem('triviaSuperateScore');

    if (completado === 'true') {
        // Buscamos la tarjeta usando la clase identificadora
        const tarjetaSuperate = document.querySelector('.item-superate');

        if (tarjetaSuperate && !tarjetaSuperate.querySelector('.score-badge')) {
            // Le aplicamos el borde verde para denotar éxito (definido en el CSS)
            tarjetaSuperate.classList.add('completada');

            // Creamos la etiqueta con la puntuación guardada
            const scoreBadge = document.createElement('div');
            scoreBadge.className = 'score-badge';
            scoreBadge.innerHTML = `<i class="fa-solid fa-circle-check"></i> ¡Completado! Récord: ${puntajeMaximo}/10`;

            // La inyectamos dentro del cuerpo de la tarjeta, no en el borde exterior
            const cuerpo = tarjetaSuperate.querySelector('.card-body');
            (cuerpo || tarjetaSuperate).appendChild(scoreBadge);
        }
    }

});