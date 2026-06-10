<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Freshman Compass</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="styles/style.css">
<link rel="stylesheet" href="styles/teachers.css">



</head>

<body>

<div class="fixed top-0 left-0 w-full h-[70px] bg-[#081d58] flex items-center justify-between px-6 shadow-lg z-50">

<div class="flex items-center gap-3">

<img src="img/IMG-20260417-WA0021.jpg"
class="w-12 h-12 rounded-full bg-white p-1">

<h1 class="text-yellow-300 font-bold text-xl">
Freshman Compass
</h1>

</div>

<div class="bg-white rounded-full px-4 py-2 w-[450px] flex">

<input
id="searchInput"
type="text"
placeholder="Buscar..."
class="flex-1 outline-none">

<button onclick="searchTeacher()">
🔍
</button>

</div>

<div class="flex gap-4">

<span class="text-yellow-400 text-xl">
🔔
</span>

<img
src="https://i.pravatar.cc/100?img=13"
class="w-10 h-10 rounded-full">

</div>

</div>


<!-- CONTENEDOR -->

<div class="flex min-h-screen pt-[70px]"
style="
background-image:url('img/IMG-20260502-WA0016.jpg');
background-size:cover;
">

<!-- SIDEBAR -->

<div class="w-[250px] bg-[#081d58] text-white flex flex-col py-6">

<div class="flex flex-col gap-4 mt-10">

<button class="flex items-center gap-4 px-8 py-4 hover:bg-[#102f7d]">
🏠 Home
</button>

<button class="flex items-center gap-4 px-8 py-4 bg-white text-black font-bold">
👤 Teachers
</button>

<button class="flex items-center gap-4 px-8 py-4 hover:bg-[#102f7d]">
📅 Eventos
</button>

<button class="flex items-center gap-4 px-8 py-4 hover:bg-[#102f7d]">
❤️ Consejos
</button>

<button class="flex items-center gap-4 px-8 py-4 hover:bg-[#102f7d]">
💬 Comentarios
</button>

<button class="flex items-center gap-4 px-8 py-4 hover:bg-[#102f7d]">
🏫 Nuestro Centro
</button>

</div>

</div>


<div class="flex-1 p-8">

<h1 class="text-6xl font-bold">
Conoce nuestros maestros
</h1>

<p class="mt-5 italic font-bold text-3xl max-w-[800px]">

Nuestros profesores están aquí para guiarte,
inspirarte y ayudarte a alcanzar tus metas

</p>

<div class="flex gap-6 mt-10 flex-wrap">

<button onclick="filterTeachers('Todos', this)"
class="filter-btn bg-[#16256B] text-white px-6 py-3 rounded-full">
Todos los maestros
</button>

<button onclick="filterTeachers('English', this)"
class="filter-btn bg-sky-200 px-8 py-3 rounded-full">
English
</button>

<button onclick="filterTeachers('Computing', this)"
class="filter-btn bg-sky-200 px-8 py-3 rounded-full">
Computing
</button>

<button onclick="filterTeachers('Values', this)"
class="filter-btn bg-sky-200 px-8 py-3 rounded-full">
Values
</button>

<button onclick="filterTeachers('Administracion', this)"
class="filter-btn bg-sky-200 px-8 py-3 rounded-full">
Administración
</button>

</div>

<div
id="teacherContainer"
class="flex flex-wrap gap-10 mt-10">
</div>

<div class="mt-10 flex justify-center">

<button
id="toggleBtn"
onclick="toggleTeachers()"

class="bg-yellow-300
px-8
py-4
rounded-2xl
font-bold
shadow-lg
hover:bg-yellow-400">

Ver más...

</button>

</div>

</div>

</div>


<script>

function searchTeacher(){

let input =
document.getElementById("searchInput")
.value
.toLowerCase();

let cards =
document.querySelectorAll(".teacher-card");

cards.forEach(card=>{

let text =
card.innerText.toLowerCase();

card.style.display =
text.includes(input)
?
"block"
:
"none";

});

}

function filterTeachers(subject, button){

document.querySelectorAll(".filter-btn")
.forEach(btn=>{

btn.classList.remove(
"bg-[#16256B]",
"text-white"
);

btn.classList.add(
"bg-sky-200",
"text-black"
);

});

button.classList.remove(
"bg-sky-200",
"text-black"
);

button.classList.add(
"bg-[#16256B]",
"text-white"
);


let cards =
document.querySelectorAll(".teacher-card");

cards.forEach(card=>{

let materia =
card.dataset.subject;

if(subject === "Todos"){

if(card.classList.contains("extra")){

card.style.display = "none";

}else{

card.style.display = "block";

}

return;

}

if(subject === "Administracion"){

if(
materia === "Administradora" ||
materia === "Director" ||
materia === "Sub-directora"
){

card.style.display = "block";

}else{

card.style.display = "none";

}

return;

}

if(materia === subject){

card.style.display = "block";

}else{

card.style.display = "none";

}

});


let btn =
document.getElementById("toggleBtn");

if(subject === "Todos"){

btn.style.display = "block";

}else{

btn.style.display = "none";

}

}

function toggleTeachers(){

let cards =
document.querySelectorAll(".extra");

let btn =
document.getElementById("toggleBtn");

if(!cards.length) return;

let hidden =
cards[0].classList.contains("hidden");

cards.forEach(card=>{

if(hidden){

card.classList.remove("hidden");
card.style.display = "block";

}else{

card.classList.add("hidden");
card.style.display = "none";

}

});

btn.innerText =
hidden
?
"Ver menos..."
:
"Ver más...";

}


async function loadTeachers(){

try{

let res =
await fetch("get_teachers.php");

let data =
await res.json();

let container =
document.getElementById("teacherContainer");

container.innerHTML = "";

data.forEach((t,index)=>{

container.innerHTML += `

<div class="teacher-card ${index >= 4 ? "extra hidden" : ""}" data-subject="${t.materia}">

<img src="img/${t.imagen}" class="teacher-img">

<h2 class="teacher-name">
${t.nombre}
</h2>

<p class="teacher-subject">
${t.materia}
</p>

<div class="teacher-icon">✉️</div>

<p class="teacher-email">
${t.correo}
</p>

<div class="teacher-icon">📅</div>

<p class="teacher-schedule">
${t.dias}<br>
${t.horario}
</p>

<div class="teacher-icon">🎂</div>

<p class="teacher-date">
${t.cumple}
</p>

<div class="teacher-quote">
"${t.frase}" 👨‍🏫
</div>

</div>

`;

});

}catch(error){

console.log("Error:", error);

}

}

document
.getElementById("searchInput")
.addEventListener("keyup", searchTeacher);

loadTeachers();
filterTeachers(
"Todos",
document.querySelector(".filter-btn")
);
</script>

</body>
</html>