document.addEventListener("DOMContentLoaded", () => {

    const boton = document.querySelector(".entrada-chat button");
    const input = document.querySelector(".entrada-chat input");
    const chat = document.querySelector(".chat-container");

    const avatarIA = `<img src="../img/ia.png" alt="IA">`;

    boton.addEventListener("click", enviarPregunta);

    input.addEventListener("keypress", function(e){
        if(e.key === "Enter"){
            enviarPregunta();
        }
    });

    function enviarPregunta(){

        let pregunta = input.value.trim();

        if(pregunta === "") return;

        // Mensaje usuario
        chat.innerHTML += `
            <div class="mensaje usuario">
                <div class="avatar">👤</div>
                <div class="burbuja usuario-burbuja">
                    ${pregunta}
                </div>
            </div>
        `;

        chat.scrollTop = chat.scrollHeight;

        fetch("buscar_respuesta.php",{
            method:"POST",
            headers:{
                "Content-Type":"application/x-www-form-urlencoded"
            },
            body:"pregunta=" + encodeURIComponent(pregunta)
        })

        .then(response => response.text())

        .then(data => {

            // Escribiendo
            const escribiendo = document.createElement("div");
            escribiendo.classList.add("mensaje","bot");

            escribiendo.innerHTML = `
                <div class="avatar">
                    ${avatarIA}
                </div>
                <div class="burbuja escribiendo">
                    CompassBot está escribiendo...
                </div>
            `;

            chat.appendChild(escribiendo);
            chat.scrollTop = chat.scrollHeight;

            setTimeout(() => {

                escribiendo.remove();

                // Respuesta bot
                const respuesta = document.createElement("div");
                respuesta.classList.add("mensaje","bot");

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

        });

        input.value = "";

    }

});