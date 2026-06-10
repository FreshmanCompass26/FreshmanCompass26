const consejos = [

{
numero:8,
titulo:"Lee diariamente",
descripcion:"Dedica 20 minutos al día a la lectura."
},

{
numero:9,
titulo:"Participa en clase",
descripcion:"Pregunta y comparte tus ideas."
},

{
numero:10,
titulo:"Mantente hidratado",
descripcion:"Tomar agua mejora la concentración."
},

{
numero:11,
titulo:"Establece metas",
descripcion:"Define objetivos alcanzables."
}

];

let indice = 0;

const boton = document.getElementById("showTipsBtn");

boton.addEventListener("click",()=>{

const contenedor=document.getElementById("tipsGrid");

for(let i=0;i<2;i++){

if(indice>=consejos.length){

boton.innerText="No hay más consejos";
boton.disabled=true;
return;
}

const consejo=consejos[indice];

const tarjeta=document.createElement("div");

tarjeta.className="tip-card";

tarjeta.innerHTML=`

<span class="number green">
${consejo.numero}
</span>

<div class="tip-info">

<div>
<h4>${consejo.titulo}</h4>
<p>${consejo.descripcion}</p>
</div>

<img src="img/consejo.png">

</div>

`;

contenedor.appendChild(tarjeta);

indice++;

}

});

const buscador=document.getElementById("searchInput");

buscador.addEventListener("keyup",()=>{

const texto=buscador.value.toLowerCase();

const tarjetas=document.querySelectorAll(".tip-card");

tarjetas.forEach(card=>{

const contenido=card.textContent.toLowerCase();

if(contenido.includes(texto)){
card.style.display="block";
}
else{
card.style.display="none";
}

});

});