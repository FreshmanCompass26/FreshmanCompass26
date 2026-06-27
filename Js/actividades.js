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
            }
        });
    });

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
        
        if (tarjetaSuperate) {
            // Le aplicamos el borde verde para denotar éxito
            tarjetaSuperate.style.border = "2px solid #2ecc71";
            tarjetaSuperate.style.transition = "all 0.3s ease"; // Para que se vea suave
            
            // Creamos la etiqueta con la puntuación guardada
            const scoreBadge = document.createElement('div');
            scoreBadge.style.color = "#2ecc71";
            scoreBadge.style.fontWeight = "bold";
            scoreBadge.style.marginTop = "12px";
            scoreBadge.style.fontSize = "0.95rem";
            scoreBadge.innerHTML = `<i class="fa-solid fa-circle-check"></i> ¡Completado! Récord: ${puntajeMaximo}/10`;
            
            // La inyectamos dentro de la tarjeta
            tarjetaSuperate.appendChild(scoreBadge);
        }
    }

});