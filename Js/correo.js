
let casoActualId = null;

document.addEventListener("DOMContentLoaded", () => {
    setTimeout(() => {
        showScreen('screen-info');
    }, 2000);
});

function showScreen(screenId) {
    document.querySelectorAll('.screen').forEach(s => s.classList.remove('active'));
    const targetScreen = document.getElementById(screenId);
    if (targetScreen) {
        targetScreen.classList.add('active');
    }
}

function iniciarJuego(nivel) {
    const radios = document.getElementsByName('selected_caso');
    for (let r of radios) { 
        if (r.checked) {
            casoActualId = r.value; 
        }
    }

    if (nivel === 'facil') {
        generarInterfazFacil();
        showScreen('screen-facil');
    } else {
        // Limpiar campos para el modo difícil
        document.getElementById('d_asunto').value = '';
        document.getElementById('d_cuerpo').value = '';
        showScreen('screen-dificil');
    }
}

function generarInterfazFacil() {
    const caso = datosCasos[casoActualId];
    const contenedor = document.getElementById('contenedor-bloques-mezclados');
    
    if (!caso || !contenedor) return;
    
    contenedor.innerHTML = "<strong>Fragmentos disponibles (Desordenados):</strong>";

    let llaves = Object.keys(caso.bloques_facil);
    llaves.sort(() => Math.random() - 0.5);

    const idsSelects = ['f_asunto', 'f_saludo', 'f_introduccion', 'f_cuerpo', 'f_despedida', 'f_firma'];
    
    idsSelects.forEach(id => {
        const sel = document.getElementById(id);
        if (sel) sel.innerHTML = '<option value="">-- Selecciona --</option>';
    });

    llaves.forEach(llave => {
        let texto = caso.bloques_facil[llave];
        
        let div = document.createElement('div');
        div.className = "bloque-guia";
        div.innerText = "📋 " + texto;
        contenedor.appendChild(div);

        idsSelects.forEach(id => {
            const sel = document.getElementById(id);
            if (sel) {
                let opt = document.createElement('option');
                opt.value = llave;
                opt.innerText = texto.substring(0, 60) + "...";
                sel.appendChild(opt);
            }
        });
    });
}

function evaluarFacil() {
    const partes = ['asunto', 'saludo', 'introduccion', 'cuerpo', 'despedida', 'firma'];
    let aciertos = 0;
    let feedback = [];

    partes.forEach(p => {
        const elementoSelect = document.getElementById('f_' + p);
        let elegido = elementoSelect ? elementoSelect.value : "";
        
        if (elegido === p) {
            aciertos++;
            feedback.push(`✅ **${p.toUpperCase()}** ordenado correctamente.`);
        } else {
            feedback.push(`❌ **${p.toUpperCase()}** está mal posicionado o vacío.`);
        }
    });

    let score = Math.round((aciertos / partes.length) * 100);
    mostrarResultados(score, feedback);
}

function evaluarDificil() {
    const caso = datosCasos[casoActualId];
    const asunto = document.getElementById('d_asunto').value.trim();
    const cuerpo = document.getElementById('d_cuerpo').value.trim();
    const fullTexto = (asunto + " " + cuerpo).toLowerCase();

    let score = 0;
    let feedback = [];

    if (asunto.length > 10) { 
        score += 15; 
        feedback.push("✅ **Asunto:** Título bien estructurado."); 
    } else { 
        feedback.push("❌ **Asunto:** Muy corto o ausente."); 
    }

    let tieneSaludo = caso.saludos_validos.some(s => fullTexto.includes(s));
    if (tieneSaludo) { 
        score += 15; 
        feedback.push("✅ **Saludo:** Dirigido formalmente."); 
    } else { 
        feedback.push("❌ **Saludo:** No se detecta un inicio formal institucional."); 
    }

    if (fullTexto.includes("espero") || fullTexto.includes("saludo")) { 
        score += 15; 
        feedback.push("✅ **Introducción:** Cortesía inicial agregada."); 
    } else { 
        feedback.push("❌ **Introducción:** Falta frase de cortesía."); 
    }

    let coincidencias = caso.palabras_clave.filter(p => fullTexto.includes(p)).length;
    if (coincidencias >= 2) { 
        score += 30; 
        feedback.push("✅ **Cuerpo:** Explicación clara con palabras del caso."); 
    } else { 
        feedback.push("❌ **Cuerpo:** Falta detallar el problema con el vocabulario clave."); 
    }

    if (fullTexto.includes("atento") || fullTexto.includes("atentamente") || fullTexto.includes("gracias") || fullTexto.includes("cordialmente")) { 
        score += 15; 
        feedback.push("✅ **Despedida:** Cierre educado."); 
    } else { 
        feedback.push("❌ **Despedida:** Olvidaste el cierre profesional."); 
    }

    if (fullTexto.includes("año") || fullTexto.includes("sección") || fullTexto.includes("promo")) { 
        score += 10; 
        feedback.push("✅ **Firma:** Identificación de estudiante agregada."); 
    } else { 
        feedback.push("❌ **Firma:** Falta tu Año/Sección institucional."); 
    }

    mostrarResultados(score, feedback);
}

function mostrarResultados(score, feedbackArray) {
    document.getElementById('result-score').innerText = `Calificación: ${score}% Profesional`;
    
    const lista = document.getElementById('result-feedback-list');
    if (lista) {
        lista.innerHTML = "";
        feedbackArray.forEach(f => {
            let div = document.createElement('div');
            div.style.marginBottom = "8px";
            div.innerHTML = f;
            lista.appendChild(div);
        });
    }

    showScreen('screen-results');
}