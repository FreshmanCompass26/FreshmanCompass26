const consejos = [

    {
        numero: 8,
        titulo: "Lee diariamente",
        descripcion: "Dedica 20 minutos diarios a la lectura."
    },

    {
        numero: 9,
        titulo: "Participa en clase",
        descripcion: "Realiza preguntas y comparte tus ideas."
    },

    {
        numero: 10,
        titulo: "Mantente hidratado",
        descripcion: "Tomar agua mejora tu concentración."
    },

    {
        numero: 11,
        titulo: "Establece metas",
        descripcion: "Define objetivos semanales alcanzables."
    },

    {
        numero: 12,
        titulo: "Haz pausas activas",
        descripcion: "Descansa unos minutos para recuperar energía."
    },

    {
        numero: 13,
        titulo: "Trabaja en equipo",
        descripcion: "Aprende de tus compañeros y colabora."
    },

    {
        numero: 14,
        titulo: "Evita procrastinar",
        descripcion: "Realiza las tareas con anticipación."
    },

    {
        numero: 15,
        titulo: "Cuida tu salud",
        descripcion: "Mantén una buena alimentación y ejercicio."
    }

];

let indice = 0;

const boton = document.getElementById("showTipsBtn");

boton.addEventListener("click", function() {

    const contenedor = document.getElementById("tipsGrid");

    for (let i = 0; i < 2; i++) {

        if (indice >= consejos.length) {

            boton.innerText = "No hay más consejos";
            boton.disabled = true;
            return;
        }

        const consejo = consejos[indice];

        const tarjeta = document.createElement("div");

        tarjeta.className = "tip-card";

        tarjeta.innerHTML = `
            <span class="number green">${consejo.numero}</span>
            <h4>${consejo.titulo}</h4>
            <p>${consejo.descripcion}</p>
        `;

        contenedor.appendChild(tarjeta);

        indice++;
    }

});