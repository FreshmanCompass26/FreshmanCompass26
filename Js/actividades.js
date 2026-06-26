document.addEventListener("DOMContentLoaded", function() {
    
    // ==========================================
    // 1. EFECTO ANIMACIÓN AL HACER SCROLL (SHOW)
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
    // 2. DETECTOR DE RECORD PARA TRIVIA SÚPERATE
    // ==========================================
    const completado = localStorage.getItem('triviaSuperateCompletada');
    const puntajeMaximo = localStorage.getItem('triviaSuperateScore');

    if (completado === 'true') {
        // Buscamos la tarjeta usando la nueva clase que agregamos
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