<?php
session_start();

include("php/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up</title>
  <link rel="stylesheet" href="styles/styles.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="container">

  <aside class="sidebar">
    <h2 class="logo">Freshman Compass</h2>
    <ul>
      <li><i class="fas fa-home"></i> Inicio</li>
      <li><i class="fas fa-users"></i> Usuarios</li>
      <li><i class="fas fa-book"></i> Cursos</li>
      <li><i class="fas fa-envelope"></i> Contacto</li>
    </ul>

    <div class="botones-sidebar">
      <a href="signup.html">
        <button type="button" class="btn btn-outline-primary">
          Sign Up
        </button>
      </a>

      <br><br>

      <a href="login.html">
        <button type="button" class="btn btn-outline-warning">
          Sign In
        </button>
      </a>
    </div>
  </aside>

  <main class="main">

    <section class="hero">
      <div>
        <h1>Tu viaje comienza aquí</h1>
        <p>Descubre oportunidades para aprender y crecer.</p>
        <button>Comenzar</button>
      </div>

      <div class="imagen">
        <img src="img/Tuviaje.jpg" alt="Imagen">
      </div>
    </section>

    <section class="cards">

      <div class="card">
        <p>Usuarios</p>
        <button><i class="fas fa-users"></i></button>
      </div>

      <div class="card">
        <p>Eventos</p>
        <button><i class="fas fa-calendar-alt"></i></button>
      </div>

      <div class="card">
        <p>Contenido</p>
        <button><i class="fas fa-folder-open"></i></button>
      </div>

      <div class="card">
        <p>Cursos</p>
        <button><i class="fas fa-book"></i></button>
      </div>

    </section>

    <section class="beneficios">
      <h2>Beneficios</h2>
      <div class="benefit-grid">
        <div class="box">Inglés intensivo</div>
        <div class="box">Habilidades tecnológicas</div>
        <div class="box">Desarrollo personal</div>
        <div class="box">Oportunidades profesionales</div>
      </div>
    </section>

    <footer>
      <p>© 2026 Freshman Compass- :)</p>
    </footer>

  </main>
</div>

</body>
</html>