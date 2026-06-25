document.addEventListener("DOMContentLoaded", () => {

    const boton = document.querySelector(".entrada-chat button");
    const input = document.querySelector(".entrada-chat input");
    const chat = document.querySelector(".chat-container");
    const sugerencias = document.querySelectorAll(".sugerencia-btn");

    const avatarIA = `<img src="../img/ia.png" alt="IA">`;

    // Botón enviar
    boton.addEventListener("click", enviarPregunta);

    // Enter para enviar
    input.addEventListener("keypress", function(e){
        if(e.key === "Enter"){
            enviarPregunta();
        }
    });

    // Botones de sugerencias
    sugerencias.forEach(btn => {

        btn.addEventListener("click", () => {

            input.value = btn.textContent.trim();

            enviarPregunta();

        });

    });

    function enviarPregunta(){

        let pregunta = input.value.trim();

        if(pregunta === "") return;

        // Mensaje usuario
        chat.innerHTML += `
            <div class="mensaje usuario">

                <div class="avatar">
                    👤
                </div>

                <div class="burbuja usuario-burbuja">
                    ${pregunta}
                </div>

            </div>
        `;

        chat.scrollTop = chat.scrollHeight;

        fetch("buscar_respuesta.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "pregunta=" + encodeURIComponent(pregunta)
        })

        .then(response => response.text())

        .then(data => {

            // Indicador de escritura
            const escribiendo = document.createElement("div");

            escribiendo.classList.add("mensaje", "bot");

            escribiendo.innerHTML = `
                <div class="avatar">
                    ${avatarIA}
                </div>

                <div class="burbuja escribiendo">
                    🧠 CompassBot está pensando...
                </div>
            `;

            chat.appendChild(escribiendo);

            chat.scrollTop = chat.scrollHeight;

            setTimeout(() => {

                escribiendo.remove();

                // Respuesta del bot
                const respuesta = document.createElement("div");

                respuesta.classList.add("mensaje", "bot");

                respuesta.innerHTML = `
                    <div class="avatar">
                        ${avatarIA}
                    </div>

                    <div class="burbuja">
                        ${data}
                    </div>
                `;

                chat.appendChild(respuesta);

                chat.scrollTop = chat.scrollHeight;

            }, 1000);

        })

        .catch(error => {

            console.error(error);

            chat.innerHTML += `
                <div class="mensaje bot">

                    <div class="avatar">
                        ${avatarIA}
                    </div>

                    <div class="burbuja">
                        ❌ Ocurrió un error al procesar la solicitud.
                    </div>

                </div>
            `;
        });

        input.value = "";

    }

});