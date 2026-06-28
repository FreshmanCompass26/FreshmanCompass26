console.log("JS OK");

// GLOBAL (IMPORTANTE)
window.seleccionar = function(nombre, card) {

    document.getElementById("psicologa").value = nombre;

    document.querySelectorAll(".card").forEach(c => {
        c.classList.remove("active");
    });

    card.classList.add("active");

    console.log("Seleccionado:", nombre);
};

// CALENDARIO
document.addEventListener("DOMContentLoaded", () => {

    flatpickr("#fecha", {
        dateFormat: "Y-m-d",
        minDate: "today"
    });

    document.getElementById("citaForm").addEventListener("submit", function(e) {
        e.preventDefault();

        const psicologa = document.getElementById("psicologa").value;
        const fecha = document.getElementById("fecha").value;
        const mensaje = document.getElementById("mensaje");

        if (!psicologa || !fecha) {
            mensaje.innerHTML = "<div class='msg error'>Completa todo</div>";
            return;
        }

        mensaje.innerHTML = `
            <div class="msg success">
                ✔ Cita con <b>${psicologa}</b><br>
                📅 ${fecha}
            </div>
        `;
    });

});