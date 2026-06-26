
console.log("JS OK");

// seleccionar psicóloga
function seleccionar(nombre, card) {
    document.getElementById("psicologa").value = nombre;

    document.querySelectorAll(".card").forEach(c => {
        c.classList.remove("active");
    });

    card.classList.add("active");

    console.log("Seleccionaste:", nombre);
}

// formulario
document.getElementById("citaForm").addEventListener("submit", function(e) {

    const psicologa = document.getElementById("psicologa").value;
    const fecha = document.getElementById("fecha").value;

    if (!psicologa || !fecha) {
        e.preventDefault();
        alert("Completa todos los campos");
        return;
    }

    alert("Cita lista con " + psicologa + " para " + fecha);
});