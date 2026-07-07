let casoActualId = null;

document.addEventListener("DOMContentLoaded", () => {

    setTimeout(() => {

        showScreen("screen-info");

    }, 2500);

});

function showScreen(screenId) {

    document
        .querySelectorAll(".screen")
        .forEach(screen => {

            screen.classList.remove("active");

        });

    document
        .getElementById(screenId)
        .classList.add("active");
}


function iniciarJuego(nivel) {

    const radioSeleccionado =
        document.querySelector(
            'input[name="selected_caso"]:checked'
        );

    if (!radioSeleccionado) {

        alert(
            "Selecciona un caso antes de continuar."
        );

        return;
    }

    casoActualId =
        radioSeleccionado.value;

    if (nivel === "facil") {

        generarInterfazFacil();

        showScreen("screen-facil");

    } else {

        document
            .getElementById("d_asunto")
            .value = "";

        document
            .getElementById("d_cuerpo")
            .value = "";

        showScreen("screen-dificil");
    }
}


function generarInterfazFacil() {

    const caso =
        datosCasos[casoActualId];

    const contenedor =
        document.getElementById(
            "sortable-correo"
        );

    if (!caso || !contenedor)
        return;

    contenedor.innerHTML = "";

    let bloques =
        Object.entries(
            caso.bloques_facil
        );

    bloques.sort(
        () => Math.random() - 0.5
    );

    bloques.forEach(
        ([tipo, texto]) => {

            const div =
                document.createElement(
                    "div"
                );

            div.className =
                "drag-item";

            div.draggable = true;

            div.dataset.tipo =
                tipo;

            div.innerHTML =
                `☰ ${texto}`;

            contenedor.appendChild(div);
        }
    );

    activarDragDrop();
}


function activarDragDrop() {

    const lista =
        document.getElementById(
            "sortable-correo"
        );

    if (!lista) return;

    lista
        .querySelectorAll(".drag-item")
        .forEach(item => {

            item.addEventListener(
                "dragstart",
                () => {

                    item.classList.add(
                        "dragging"
                    );
                }
            );

            item.addEventListener(
                "dragend",
                () => {

                    item.classList.remove(
                        "dragging"
                    );
                }
            );

        });

    lista.addEventListener(
        "dragover",
        e => {

            e.preventDefault();

            const afterElement =
                obtenerElementoDespues(
                    lista,
                    e.clientY
                );

            const dragging =
                document.querySelector(
                    ".dragging"
                );

            if (!dragging)
                return;

            if (!afterElement) {

                lista.appendChild(
                    dragging
                );

            } else {

                lista.insertBefore(
                    dragging,
                    afterElement
                );
            }
        }
    );
}

function obtenerElementoDespues(
    container,
    y
) {

    const elementos = [

        ...container.querySelectorAll(
            ".drag-item:not(.dragging)"
        )

    ];

    return elementos.reduce(

        (closest, child) => {

            const box =
                child.getBoundingClientRect();

            const offset =
                y -
                box.top -
                box.height / 2;

            if (
                offset < 0 &&
                offset > closest.offset
            ) {

                return {

                    offset,

                    element: child
                };
            }

            return closest;
        },

        {
            offset:
                Number.NEGATIVE_INFINITY
        }

    ).element;
}
function evaluarCorreo() {

    const ordenCorrecto = [

        "asunto",
        "saludo",
        "introduccion",
        "cuerpo",
        "despedida",
        "firma"

    ];

    const elementos =
        document.querySelectorAll(
            "#sortable-correo .drag-item"
        );

    let aciertos = 0;

    let feedback = [];

    elementos.forEach(
        (item, index) => {

            item.classList.remove(
                "correct",
                "incorrect"
            );

            if (
                item.dataset.tipo ===
                ordenCorrecto[index]
            ) {

                aciertos++;

                item.classList.add(
                    "correct"
                );

            } else {

                item.classList.add(
                    "incorrect"
                );
            }
        }
    );

    let score =
        Math.round(
            (
                aciertos /
                ordenCorrecto.length
            ) * 100
        );

    feedback.push(
        `Has ordenado correctamente ${aciertos} de ${ordenCorrecto.length} secciones.`
    );

    mostrarResultados(
        score,
        feedback
    );
}

function evaluarDificil() {

    const caso =
        datosCasos[casoActualId];

    const asunto =
        document
            .getElementById(
                "d_asunto"
            )
            .value
            .trim();

    const cuerpo =
        document
            .getElementById(
                "d_cuerpo"
            )
            .value
            .toLowerCase();

    let score = 0;

    let feedback = [];

    /* Asunto */

    if (asunto.length >= 15) {

        score += 15;

        feedback.push(
            "Asunto claro y profesional."
        );

    } else {

        feedback.push(
            "El asunto es demasiado corto."
        );
    }

    

    let saludoValido =
        caso.saludos_validos.some(
            saludo =>
                cuerpo.includes(
                    saludo
                )
        );

    if (saludoValido) {

        score += 15;

        feedback.push(
            "Saludo formal detectado."
        );

    } else {

        feedback.push(
            "Falta un saludo profesional."
        );
    }

    /* Introducción */

    if (
        cuerpo.includes("espero") ||
        cuerpo.includes("cordial")
    ) {

        score += 15;

        feedback.push(
            "Introducción adecuada."
        );

    } else {

        feedback.push(
            "Falta una introducción cordial."
        );
    }

    let coincidencias =
        caso.palabras_clave.filter(
            palabra =>
                cuerpo.includes(
                    palabra
                )
        ).length;

    if (coincidencias >= 3) {

        score += 30;

        feedback.push(
            "Situación explicada correctamente."
        );

    } else {

        feedback.push(
            "La explicación es insuficiente."
        );
    }

    /* Despedida */

    if (

        cuerpo.includes("gracias") ||

        cuerpo.includes("atentamente") ||

        cuerpo.includes("cordialmente") ||

        cuerpo.includes("quedo atento")

    ) {

        score += 15;

        feedback.push(
            "Despedida profesional."
        );

    } else {

        feedback.push(
            "Falta una despedida adecuada."
        );
    }

    if (

        cuerpo.includes("año") ||

        cuerpo.includes("sección") ||

        cuerpo.includes("freshman")

    ) {

        score += 10;

        feedback.push(
            "Firma detectada."
        );

    } else {

        feedback.push(
            " No se detecta firma."
        );
    }

    mostrarResultados(
        score,
        feedback
    );
}

function mostrarResultados(
    score,
    feedbackArray
) {

    document
        .getElementById(
            "result-score"
        )
        .innerHTML =

        `Calificación: ${score}%`;

    const lista =
        document.getElementById(
            "result-feedback-list"
        );

    lista.innerHTML = "";

    feedbackArray.forEach(
        item => {

            const div =
                document.createElement(
                    "div"
                );

            div.style.marginBottom =
                "12px";

            div.innerHTML =
                item;

            lista.appendChild(
                div
            );
        }
    );

    showScreen(
        "screen-results"
    );
}