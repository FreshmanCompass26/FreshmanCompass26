<?php
session_start();

$servername = "localhost";
$username = "root";       
$password = "";           

$dbname = "freshman_db"; // 

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$sql = "SELECT * FROM classrooms";
$resultado = $conn->query($sql);

if ($resultado) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<h3>" . $fila['classroom'] . "</h3>";
        echo "<p><strong>Descripción:</strong> " . $fila['descripcion'] . "</p>";
        echo "<p><strong>Características:</strong> " . $fila['caracteristicas'] . "</p>";
        echo "<p><strong>Caracteristicas:</strong>" . $fila['caracteristicas'] . "</p>";

        echo "<p><strong>Normas:</strong> " . $fila['normas'] . "</p>";
        echo "<hr>";
    }
} else {
    echo "Error en la consulta: " . $conn->error;
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classrooms</title>

    <link rel="stylesheet" href="styles/classrroms.css">

  
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>
    

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="top-navbar">



 <div class="top-right">

    <button class="btn-login">
        Registrarse
    </button>

    <button class="btn-signup">
        Crear Cuenta
    </button>

</div>

</div>

    
    <div class="sidebar">

        <div class="logo">
            <img src="img/image7.png" alt="">
            <span>Freshman Compass</span>
        </div>

        <ul class="menu">

            <li>
                <a href="#">
                    <i class="fa-solid fa-house"></i>
                    <span>Inicio</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa-solid fa-user-group"></i>
                    <span>Teachers</span>
                </a>
            </li>

            <li class="active">
                <a href="#">
                    <i class="fa-solid fa-school"></i>
                    <span>Nuestro centro</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa-solid fa-heart"></i>
                    <span>Consejos</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span>Eventos</span>
                </a>
            </li>

        </ul>

        <!-- FRASE -->
        <div class="quote">

            <span class="icon">❝</span>

            <p>
                Don’t count the days,<br>
                make the days count.
            </p>

            <small>— Muhammad Ali</small>

        </div>

    </div>

<div class="card-salones">
  <h2>Nuestros salones</h2>
  <p class="card-subtexto">Espacios diseñados para tu aprendizaje en inglés, informática y valores</p>
</div>

      <!-- CARDS -->
   <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/classroom1.jpeg" width="200" height="150" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Classroom 1</h5>
        <p class="card-text">Espacio versátil para talleres,<br> capacitaciones, reuniones <br>y actividades extracurriculares.</p>
        
        <!-- Botón que activa la card azul -->
        <a href="#" class="btn-vermas">Ver más...</a>
      </div>
    </div>
  </div>
</div>


<div class="card-salon" style="display: none;">
 <div class="card-salon">
  <div class="card-section features">
    <h3>Características</h3>
    <ul>
      <li>✓ Espacio amplio y cómodo.</li>
      <li>✓ Proyector y audio.</li>
      <li>✓ Aire acondicionado.</li>
    </ul>
  </div>
  <div class="card-section rules">
    <h3>Normas en el salón</h3>
    <ul>
      <li>✓ Cumplir con el horario de limpieza correspondiente.</li>
      <li>✓ Evitar manchar mesas.</li>
      <li>✓ Evitar permanecer dentro sin autorización.</li>
    </ul>
  </div>
</div>

</div>
<script>
  document.querySelector('.btn-vermas').addEventListener('click', function(e) {
    e.preventDefault(); 
    const cardSalon = document.querySelector('.card-salon');
    if (cardSalon.style.display === 'none') {
      cardSalon.style.display = 'block';
    } else {
      cardSalon.style.display = 'none';
    }
  });
</script>


 <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/classroom2.jpeg" width="200" height="150" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Classroom 2</h5>
        <p class="card-text">
          Ambiente ideal para el aprendizaje del idioma inglés, informática y valores con recursos audiovisuales y actividades interactivas.
        </p>
        <!-- Botón con atributo data-target -->
        <a href="#" class="btn-vermas" data-target="card-salon-2">Ver más...</a>
      </div>
    </div>
  </div>
</div>


<div id="card-salon-2" class="card-salon" style="display: none;">
  <div class="card-section features">
    <h3>Características</h3>
    <ul>
      <li>✓ Espacio amplio y cómodo.</li>
      <li>✓ Proyector y audio.</li>
      <li>✓ Aire acondicionado.</li>
    </ul>
  </div>
  <div class="card-section rules">
    <h3>Normas en el salón</h3>
    <ul>
      <li>✓ Cumplir con el horario de limpieza correspondiente.</li>
      <li>✓ Evitar manchar mesas.</li>
      <li>✓ Evitar permanecer dentro sin autorización.</li>
    </ul>
  </div>
</div>

<script>
 document.querySelectorAll('.btn-vermas').forEach(function(boton) {
  boton.addEventListener('click', function(e) {
    e.preventDefault();
    const targetId = boton.getAttribute('data-target'); 
    const cardSalon = document.getElementById(targetId);

    if (cardSalon) {
      cardSalon.classList.toggle('visible'); 
    }
  });
});

</script>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/classroom3.jpeg" width="200" height="150" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Classroom 3</h5>
        <p class="card-text">
          Ambiente ideal para el aprendizaje del idioma inglés, informática y valores con recursos audiovisuales y actividades interactivas.
        </p>
        <a href="#" class="btn-vermas" data-target="card-salon-3">Ver más...</a>
      </div>
    </div>
  </div>
</div>

<div id="card-salon-3" class="card-salon">
  <div class="card-section features">
    <h3>Características</h3>
    <ul>
      <li>✓ Espacio amplio y cómodo.</li>
      <li>✓ Proyector y audio.</li>
      <li>✓ Aire acondicionado.</li>
    </ul>
  </div>
  <div class="card-section rules">
    <h3>Normas en el salón</h3>
    <ul>
      <li>✓ Cumplir con el horario de limpieza correspondiente.</li>
      <li>✓ Evitar manchar mesas.</li>
      <li>✓ Evitar permanecer dentro sin autorización.</li>
    </ul>
  </div>
</div>

<script>
  document.querySelectorAll('.btn-vermas').forEach(function(boton) {
  boton.addEventListener('click', function(e) {
    e.preventDefault();
    const targetId = boton.getAttribute('data-target'); 
    const cardSalon = document.getElementById(targetId);

    if (cardSalon) {
      cardSalon.classList.toggle('visible'); 
    }
  });
});

</script>


<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/classroom4.jpeg" width="200" height="150" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Classroom 4</h5>
        <p class="card-text">
          Aula equipada con computadoras e internet para aprender herramientas tecnológicas y desarrollar habilidades en inglés.
        </p>
        <!-- Botón con data-target -->
        <a href="#" class="btn-vermas" data-target="card-salon-4">Ver más...</a>
      </div>
    </div>
  </div>
</div>


<div id="card-salon-4" class="card-salon" style="display: none;">
  <div class="card-section features">
    <h3>Características</h3>
    <ul>
      <li>✓ Espacio amplio y cómodo.</li>
      <li>✓ Proyector y audio.</li>
      <li>✓ Aire acondicionado.</li>
    </ul>
  </div>
  <div class="card-section rules">
    <h3>Normas en el salón</h3>
    <ul>
      <li>✓ Cumplir con el horario de limpieza correspondiente.</li>
      <li>✓ Evitar manchar mesas.</li>
      <li>✓ Evitar permanecer dentro sin autorización.</li>
    </ul>
  </div>
</div>

<script>
  document.querySelectorAll('.btn-vermas').forEach(function(boton) {
    boton.addEventListener('click', function(e) {
      e.preventDefault();
      const targetId = boton.getAttribute('data-target'); 
      const cardSalon = document.getElementById(targetId);
      // alterna mostrar/ocultar
      if (cardSalon.style.display === 'none') {
        cardSalon.style.display = 'flex'; 
      } else {
        cardSalon.style.display = 'none';
      }
    });
  });
</script>

 
  


</body>
</html>