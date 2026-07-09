let casoActual = 1;
let modoActual = "";

window.addEventListener("load", () => {
    setTimeout(() => {
        showScreen("screen-info");
    }, 1000);
});

function showScreen(id){

    document.querySelectorAll(".screen").forEach(s=>{
        s.classList.remove("active");
    });

    document.getElementById(id).classList.add("active");

}

function iniciarJuego(modo){

    modoActual = modo;

    casoActual = Number(document.querySelector("input[name='selected_caso']:checked").value);

    if(modo==="facil"){

        cargarModoFacil();

        showScreen("screen-facil");

    }else{

        document.getElementById("d_asunto").value="";
        document.getElementById("d_cuerpo").value="";

        showScreen("screen-dificil");

    }

}

function cargarModoFacil(){

    const datos = datosCasos[casoActual].bloques_facil;

    const bloques=[

        {tipo:"asunto",texto:datos.asunto},
        {tipo:"saludo",texto:datos.saludo},
        {tipo:"introduccion",texto:datos.introduccion},
        {tipo:"cuerpo",texto:datos.cuerpo},
        {tipo:"despedida",texto:datos.despedida},
        {tipo:"firma",texto:datos.firma}

    ];

    bloques.sort(()=>Math.random()-0.5);

    const cont=document.getElementById("sortable-correo");

    cont.innerHTML="";

    bloques.forEach(b=>{

        const div=document.createElement("div");

        div.className="drag-item";

        div.draggable=true;

        div.dataset.tipo=b.tipo;

        div.innerText=b.texto;

        cont.appendChild(div);

    });

    activarDrag();

}

function activarDrag(){

    const items=document.querySelectorAll(".drag-item");

    let drag;

    items.forEach(item=>{

        item.addEventListener("dragstart",()=>{

            drag=item;

            item.classList.add("dragging");

        });

        item.addEventListener("dragend",()=>{

            item.classList.remove("dragging");

        });

        item.addEventListener("dragover",(e)=>{

            e.preventDefault();

        });

        item.addEventListener("drop",(e)=>{

            e.preventDefault();

            if(drag!==item){

                const padre=item.parentNode;

                const siguiente=item.nextSibling===drag ? item : item.nextSibling;

                padre.insertBefore(drag,item);

                padre.insertBefore(item,siguiente);

            }

        });

    });

}

function evaluarCorreo(){

    const correcto=[
        "asunto",
        "saludo",
        "introduccion",
        "cuerpo",
        "despedida",
        "firma"
    ];

    const items=document.querySelectorAll(".drag-item");

    let puntos=0;

    let feedback=[];

    items.forEach((item,i)=>{

        item.classList.remove("correct","incorrect");

        if(item.dataset.tipo===correcto[i]){

            puntos++;

            item.classList.add("correct");

        }else{

            item.classList.add("incorrect");

        }

    });

    let porcentaje=Math.round((puntos/correcto.length)*100);

    feedback.push(`Orden correcto: ${puntos} de ${correcto.length} bloques.`);

    mostrarResultados(porcentaje,feedback);

}

function evaluarDificil(){

    const asunto=document.getElementById("d_asunto").value.toLowerCase();

    const cuerpo=document.getElementById("d_cuerpo").value.toLowerCase();

    const datos=datosCasos[casoActual];

    let score=0;

    let feedback=[];

    if(asunto.length>5){

        score+=20;

        feedback.push("Asunto adecuado.");

    }else{

        feedback.push("Debes escribir un asunto.");

    }

    let saludo=false;

    datos.saludos_validos.forEach(s=>{

        if(cuerpo.includes(s.toLowerCase())){

            saludo=true;

        }

    });

    if(saludo){

        score+=20;

        feedback.push("Saludo correcto.");

    }else{

        feedback.push("Falta un saludo formal.");

    }

    let palabras=0;

    datos.palabras_clave.forEach(p=>{

        if(cuerpo.includes(p.toLowerCase())){

            palabras++;

        }

    });

    score+=palabras*10;

    feedback.push(`${palabras} palabras clave detectadas.`);

    if(cuerpo.includes("gracias")){

        score+=10;

        feedback.push("Incluye agradecimiento.");

    }else{

        feedback.push("Sería bueno agradecer.");

    }

    if(cuerpo.includes("atentamente") || cuerpo.includes("saludos")){

        score+=20;

        feedback.push("Despedida adecuada.");

    }else{

        feedback.push("Falta despedida.");

    }

    if(cuerpo.length>120){

        score+=20;

        feedback.push("Correo suficientemente claro.");

    }else{

        feedback.push("Desarrolla más el cuerpo del correo.");

    }

    if(score>100) score=100;

    mostrarResultados(score,feedback);

}

function mostrarResultados(score, feedbackArray) {

    const scoreContainer=document.getElementById("result-score");

    let mensaje="¡Puedes volver a repasar la info!";

    if(score>=85){

        mensaje="¡Excelente trabajo!";

    }else if(score>=60){

        mensaje="¡Buen intento!";

    }

    scoreContainer.innerHTML=`
        <div class="score-num">${score}%</div>
        <div class="score-total">${mensaje}</div>
    `;

    const lista=document.getElementById("result-feedback-list");

    lista.innerHTML="";

    feedbackArray.forEach(item=>{

        const div=document.createElement("div");

        div.style.marginBottom="10px";

        div.innerHTML="• "+item;

        lista.appendChild(div);

    });

    showScreen("screen-results");

}