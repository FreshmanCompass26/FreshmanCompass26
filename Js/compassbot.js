document.addEventListener("DOMContentLoaded", () => {

    const boton = document.querySelector(".entrada-chat button");
    const input = document.querySelector(".entrada-chat input");
    const chat = document.querySelector(".chat-container");
    const sugerencias = document.querySelectorAll(".sugerencia-btn");
    const nuevoChatBtn = document.getElementById("nuevoChatBtn");

    const avatarIA = `<img src="../img/ia.png" alt="IA">`;

    // -------------------------
    // Enviar con botón
    // -------------------------

    boton.addEventListener("click", enviarPregunta);

    // -------------------------
    // Enviar con Enter
    // -------------------------

    input.addEventListener("keydown", function(e){

        if(e.key === "Enter"){

            e.preventDefault();

            enviarPregunta();

        }

    });

    // -------------------------
    // Botones sugerencias
    // -------------------------

    sugerencias.forEach(btn=>{

        btn.addEventListener("click",()=>{

            input.value=btn.textContent.trim();

            enviarPregunta();

        });

    });

    // -------------------------
    // Nuevo Chat
    // -------------------------

    nuevoChatBtn.addEventListener("click",()=>{

        fetch("nuevo_chat.php")

        .then(r=>r.text())

        .then(()=>{

            chat.innerHTML=`

            <div class="mensaje bot">

                <div class="avatar1">

                    <img src="../img/ia.png" alt="IA">

                </div>

                <div class="burbuja">

                    <strong>¡Hola! 👋</strong><br><br>

                    Soy <strong>CompassBot</strong>, el asistente virtual de Freshman Compass.

                    Estoy aquí para ayudarte durante tu primer año en el Programa ¡Supérate! ADOC.

                    ¿En qué puedo ayudarte hoy?

                </div>

            </div>

            `;

            input.focus();

        });

    });

    // -------------------------
    // Función principal
    // -------------------------

    function enviarPregunta(){

        const pregunta=input.value.trim();

        if(pregunta==="") return;

        // Desactivar mientras responde

        boton.disabled=true;

        input.disabled=true;

        // Usuario

        chat.innerHTML+=`

        <div class="mensaje usuario">

            <div class="avatar">

                👤

            </div>

            <div class="burbuja usuario-burbuja">

                ${pregunta}

            </div>

        </div>

        `;

        input.value="";

        chat.scrollTop=chat.scrollHeight;

        // Indicador escribiendo

        const escribiendo=document.createElement("div");

        escribiendo.classList.add("mensaje","bot");

        escribiendo.innerHTML=`

        <div class="avatar1">

            <img src="../img/ia.png" alt="IA">

        </div>

        <div class="burbuja">

            🧠 CompassBot está pensando...

        </div>

        `;

        chat.appendChild(escribiendo);

        chat.scrollTop=chat.scrollHeight;

        fetch("buscar_respuesta.php",{

            method:"POST",

            headers:{

                "Content-Type":"application/x-www-form-urlencoded"

            },

            body:"pregunta="+encodeURIComponent(pregunta)

        })

        .then(response=>response.text())

        .then(data=>{

            escribiendo.remove();

            chat.innerHTML+=`

            <div class="mensaje bot">

                <div class="avatar1">

                    <img src="../img/ia.png" alt="IA">

                </div>

                <div class="burbuja">

                    ${data}

                </div>

            </div>

            `;

            chat.scrollTop=chat.scrollHeight;

        })

        .catch(()=>{

            escribiendo.remove();

            chat.innerHTML+=`

            <div class="mensaje bot">

                <div class="avatar1">

                    <img src="../img/ia.png" alt="IA">

                </div>

                <div class="burbuja">

                    ❌ Ocurrió un error al comunicarme.

                </div>

            </div>

            `;

        })

        .finally(()=>{

            boton.disabled=false;

            input.disabled=false;

            input.focus();

        });

    }

});