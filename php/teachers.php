<?php

$pagina_actual = "teachers";


include("navbar.php");


include("conexion.php");


$query = "SELECT * FROM teachers";
$resultado = $conn->query($query);


if (!$resultado) {
    die("Error en la consulta: " . $conn->error);
}
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Teachers</title>

  <?php
include("conexion.php");

$query = "SELECT * FROM teachers";
$resultado = $conn->query($query);

if (!$resultado) {
    die("Error: " . $conn->error);
}
?>



<!DOCTYPE html>

<html lang="es">

<head>


<meta charset="UTF-8">

<title>Teachers</title>


<!-- NAVBAR GENERAL -->

<link rel="stylesheet" href="../styles/navbar.css">


<!-- ESTILO GENERAL -->

<link rel="stylesheet" href="../styles/general.css">


<!-- ESTILO DE ESTA PAGINA -->

<link rel="stylesheet" href="../styles/teachers.css">



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


</head>



<body>


<?php include("navbar.php"); ?>



<div class="main">


<h1>Conoce nuestros maestros:</h1>


<p>

Nuestros profesores están aquí para guiarte,
inspirarte y ayudarte a alcanzar tus metas.

</p>




<div class="filtros">


<button class="active" onclick="filtrar('all', this)">
Todos los maestros
</button>


<button onclick="filtrar('English', this)">
English
</button>


<button onclick="filtrar('Computing', this)">
Computing
</button>


<button onclick="filtrar('Values', this)">
Values
</button>


<button onclick="filtrar('Administración', this)">
Administración
</button>


</div>





<div class="cards">



<?php


$contador = 0;



if($resultado->num_rows > 0){


while($row = $resultado->fetch_assoc()){



$original = trim($row['materia']);



if(

$original == "English" ||

$original == "Computing" ||

$original == "Values"

){

$materia = $original;


}else{


$materia = "Administración";


}



$ocultar = ($contador >= 4) ? 'style="display:none;"' : '';

$contador++;



?>



<div class="card"

data-materia="<?php echo $materia; ?>"

<?php echo $ocultar; ?>

>



<div class="img-container">


<img 

src="../img/<?php echo $row['imagen']; ?>"

class="foto"


alt="Teacher">


</div>



<h3>

<?php echo $row['nombre']; ?>

</h3>



<span class="materia">

<?php echo $materia; ?>

</span>



<div class="correo">

<p>

<?php echo $row['correo']; ?>

</p>

</div>




<div class="horario">


<p><strong>Schedule</strong></p>


<p><?php echo $row['dias']; ?></p>


<p><?php echo $row['horario']; ?></p>


</div>




<div class="fecha">


<p><strong>Birthday</strong></p>


<p><?php echo $row['cumple']; ?></p>


</div>




<div class="frase">


"<?php echo $row['frase']; ?>"


</div>




</div>



<?php


}


}else{


echo "<p>No hay registros en la tabla teachers.</p>";


}



?>



</div>




<div class="btn-container">


<button id="verMas" class="vermas">

Ver más...

</button>


</div>



</div>





<script>


const cards = document.querySelectorAll(".card");

const botonVerMas = document.getElementById("verMas");


let filtroActual = "all";





function filtrar(materia, boton){


filtroActual = materia;



document.querySelectorAll(".filtros button")

.forEach(btn => btn.classList.remove("active"));



boton.classList.add("active");



let contador = 0;



cards.forEach(card => {



const coincide = 

materia === "all" ||

card.dataset.materia === materia;




if(coincide){



if(contador < 4){

card.style.display="block";


}else{


card.style.display="none";


}



contador++;



}else{


card.style.display="none";


}



});



botonVerMas.style.display = contador > 4 

? "inline-block"

: "none";



}






botonVerMas.addEventListener("click",function(){



cards.forEach(card=>{


if(

filtroActual === "all" ||

card.dataset.materia === filtroActual

){


card.style.display="block";


}



});



this.style.display="none";


});



</script>



</body>

</html>