function mostrarResultados(score, feedbackArray) {
    const scoreContainer = document.getElementById("result-score");
    
    let mensajeRendimiento = "¡Puedes volver a repasar la info!";
    if (score >= 85) {
        mensajeRendimiento = "¡Excelente trabajo! ¡Misión cumplida!";
    } else if (score >= 60) {
        mensajeRendimiento = "¡Buen intento! Sigue mejorando.";
    }

    // 2. Inyectar la estructura limpia (Número grande arriba + etiqueta abajo)
    scoreContainer.innerHTML = `
        <div class="score-num">${score}%</div>
        <div class="score-total">${mensajeRendimiento}</div>
    `;

    // 3. Renderizar la lista de retroalimentación
    const lista = document.getElementById("result-feedback-list");
    lista.innerHTML = "";

    feedbackArray.forEach(item => {
        const div = document.createElement("div");
        div.style.marginBottom = "12px";
        div.style.display = "flex";
        div.style.alignItems = "center";
        div.style.gap = "8px";
        
        // Un detalle estético: añadimos un icono dinámico según el texto
        if (item.toLowerCase().includes("correcta") || item.toLowerCase().includes("detectado") || item.toLowerCase().includes("adecuada") || item.toLowerCase().includes("claro")) {
            div.innerHTML = `<span>✅</span> <span>${item}</span>`;
            div.style.color = "#166534"; // Texto verde oscuro profesional
        } else {
            div.innerHTML = `<span>❌</span> <span>${item}</span>`;
            div.style.color = "#991b1b"; // Texto rojo oscuro profesional
        }

        lista.appendChild(div);
    });

    // 4. Mostrar la pantalla de resultados
    showScreen("screen-results");
}