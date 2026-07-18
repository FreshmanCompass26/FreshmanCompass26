console.log("JS OK");

// Hacer la función visible globalmente para el onclick="seleccionar(...)" de las tarjetas
window.seleccionar = function(idPsicologa, card){
    const inputPsicologa = document.getElementById("psicologa");
    
    // Almacenamos el ID numérico de la base de datos de forma oculta en el dataset
    inputPsicologa.dataset.id = idPsicologa;

    // Buscamos el nombre visible del h3 para ponerlo estéticamente en el input
    const nombreVisual = card.querySelector("h3").innerText;
    inputPsicologa.value = nombreVisual;

    document.querySelectorAll(".card").forEach(c => {
        c.classList.remove("active");
    });

    card.classList.add("active");
};

// Hacer la función visible globalmente para el onclick="cerrarModal()"
window.cerrarModal = function(){
    document.getElementById("modal").classList.remove("show");
};

document.addEventListener("DOMContentLoaded", () => {
    
    // Manejo de clicks en los botones de horarios
    document.querySelectorAll(".hora-btn").forEach(btn => {
        btn.addEventListener("click", () => {
            if(btn.classList.contains("ocupada")) return;

            document.querySelectorAll(".hora-btn").forEach(b => {
                b.classList.remove("active");
            });

            btn.classList.add("active");
            document.getElementById("hora").value = btn.dataset.hora;
        });
    });

    // Inicializar Flatpickr
    flatpickr("#fecha", {
        dateFormat: "Y-m-d",
        minDate: "today"
    });

    // Procesar el formulario con Fetch
    document.getElementById("citaForm").addEventListener("submit", function(e){
        e.preventDefault();

        // Extraemos el ID guardado en el dataset (o vacío si no seleccionó)
        const idPsicologa = document.getElementById("psicologa").dataset.id || "";
        const nombrePsicologa = document.getElementById("psicologa").value; 
        const fecha = document.getElementById("fecha").value;
        const hora = document.getElementById("hora").value;
        const motivo = document.getElementById("motivo").value;
        const mensaje = document.getElementById("mensaje");

        if(idPsicologa == "" || fecha == "" || hora == ""){
            mensaje.innerHTML = "<div class='msg error'>Completa todos los campos.</div>";
            return;
        }

        fetch("../php/guardar_cita.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: 
                "psicologa=" + encodeURIComponent(idPsicologa) + // Enviamos el ID numérico
                "&fecha=" + encodeURIComponent(fecha) +
                "&hora=" + encodeURIComponent(hora) +
                "&motivo=" + encodeURIComponent(motivo)
        })
        .then(res => res.text())
        .then(res => {
            console.log(res);

            if(res.trim() == "ok"){
                // Mostrar Modal de éxito con los datos legibles
                document.getElementById("modal").classList.add("show");

                document.getElementById("textoConfirmacion").innerHTML = `
                    Psicóloga: <b>${nombrePsicologa}</b><br>
                    Fecha: ${fecha}<br>
                    Hora: ${hora}
                `;

                // Limpiar formulario y estados visuales
                document.getElementById("citaForm").reset();
                
                const inputPsicologa = document.getElementById("psicologa");
                inputPsicologa.value = "";
                delete inputPsicologa.dataset.id; // Limpiamos el ID del dataset
                
                document.getElementById("hora").value = "";

                document.querySelectorAll(".card").forEach(c => {
                    c.classList.remove("active");
                });
                document.querySelectorAll(".hora-btn").forEach(b => {
                    b.classList.remove("active");
                });

                mensaje.innerHTML = "";
            } else {
                mensaje.innerHTML = "<div class='msg error'>" + res + "</div>";
            }
        })
        .catch(error => {
            console.error(error);
            mensaje.innerHTML = "<div class='msg error'>Error de conexión.</div>";
        });
    });
});