// seleccionar psicóloga
function seleccionar(nombre){
    document.getElementById("psicologa").value = nombre;
}

// calendario PRO
flatpickr("#fecha", {
    minDate: "today",
    dateFormat: "Y-m-d",
    altInput: true,
    altFormat: "F j, Y"
});