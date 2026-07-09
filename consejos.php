<?php
$pagina_actual = "consejos";
include("php/navbar.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Freshman Compass | Consejos</title>

<link rel="stylesheet" href="styles/navbar.css">
<link rel="stylesheet" href="styles/consejos.css">
<link rel="stylesheet" href="styles/footer.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<div class="contenido">

<div class="page-topbar">

<?php if(isset($_SESSION['nombre'])): ?>

<?php
$nombre=$_SESSION['nombre'];
$inicial=strtoupper(substr($nombre,0,1));
?>

<div class="dropdown user-dropdown">

<div class="user-trigger" data-bs-toggle="dropdown">

<div class="avatar"><?php echo $inicial; ?></div>

<span class="username">
<?php echo htmlspecialchars($nombre); ?>
</span>

<i class="fa-solid fa-chevron-down"
style="font-size:11px;color:#8a9bb0;"></i>

</div>

<ul class="dropdown-menu dropdown-menu-end custom-dropdown">

<li class="dropdown-header-user">

<div class="avatar-lg">
<?php echo $inicial; ?>
</div>

<div>

<div class="name">
<?php echo htmlspecialchars($nombre); ?>
</div>

<div class="sub">
Estudiante
</div>

</div>

</li>

<li><hr class="dropdown-divider"></li>

<li>

<a class="dropdown-item"
href="perfil.php">

<i class="fa-regular fa-user"></i>

Perfil

</a>

</li>

<li>

<a class="dropdown-item logout"
href="php/logout.php">

<i class="fa-solid fa-right-from-bracket"></i>

Cerrar sesión

</a>

</li>

</ul>

</div>

<?php else: ?>

<a href="login.php" class="btn-login">
Iniciar sesión
</a>

<a href="signup.php" class="btn-signup">
Crear cuenta
</a>

<?php endif; ?>

</div>

<section class="hero">

<div class="hero-left">

<img
src="img/foco.png"
class="bulb">

<div>

<h1>
Consejos para tu primer año
</h1>

<p class="hero-text">

Pequeñas acciones pueden marcar una gran diferencia.
Descubre recomendaciones que te ayudarán a organizarte,
aprender mejor y disfrutar tu experiencia en
Centro ¡Supérate! ADOC.

</p>

</div>

</div>

</section>

<section class="featured">

<h3>

<i class="fa-solid fa-star"></i>

Recomendaciones destacadas

</h3>

<p>

Explora consejos prácticos que te ayudarán durante
tu primer año.

</p>

<div class="featured-list">

<div class="featured-item">

<span class="badge">
1
</span>

Practica nuevo vocabulario de acuerdo con tu nivel de inglés.

</div>

<div class="featured-item">

<span class="badge">
2
</span>

Nunca te quedes con dudas. Acércate a tu profesor.

</div>

</div>

</section>

<div class="tips-grid" id="tipsGrid">

<div class="tip-card">

<span class="number">
1
</span>

<div class="tip-info">

<div>

<h4>
Organiza tu tiempo
</h4>

<p>
Utiliza bien tu tiempo libre y prioriza actividades.
</p>

</div>

<img src="img/calendario.png">

</div>

</div>

<div class="tip-card">

<span class="number yellow">
2
</span>

<div class="tip-info">

<div>

<h4>
Duerme adecuadamente
</h4>

<p>
Dormir ocho horas ayuda a comenzar bien el día.
</p>

</div>

<img src="img/dormir.png">

</div>

</div>

<div class="tip-card">

<span class="number purple">
3
</span>

<div class="tip-info">

<div>

<h4>
Siempre toma apuntes
</h4>

<p>
Las notas ayudan a recordar información importante.
</p>

</div>

<img src="img/apuntes.png">

</div>

</div>
<div class="tip-card">

<span class="number green">
4
</span>

<div class="tip-info">

<div>

<h4>
No te compares
</h4>

<p>
Cada estudiante tiene su propio ritmo de aprendizaje.
</p>

</div>

<img src="img/cerebro.png">

</div>

</div>

<div class="tip-card extra-tip">

<span class="number">
5
</span>

<div class="tip-info">

<div>

<h4>
Pregunta siempre
</h4>

<p>
Resolver tus dudas a tiempo evita acumular dificultades.
</p>

</div>

<img src="img/pregunta.png">

</div>

</div>

<div class="tip-card extra-tip">

<span class="number yellow">
6
</span>

<div class="tip-info">

<div>

<h4>
Sé puntual
</h4>

<p>
Llegar temprano demuestra responsabilidad y respeto.
</p>

</div>

<img src="img/reloj.png">

</div>

</div>

<div class="tip-card extra-tip">

<span class="number purple">
7
</span>

<div class="tip-info">

<div>

<h4>
Trabaja en equipo
</h4>

<p>
Aprender con tus compañeros fortalece tus habilidades.
</p>

</div>

<img src="img/equipo.png">

</div>

</div>

<div class="tip-card extra-tip">

<span class="number green">
8
</span>

<div class="tip-info">

<div>

<h4>
Mantén una actitud positiva
</h4>

<p>
Los desafíos son oportunidades para aprender y crecer.
</p>

</div>

<img src="img/positivo.png">

</div>

</div>

</div>

<div class="btn-container">

<button id="showTipsBtn">

Ver más...

</button>

</div>

</div>

<script src="js/consejosscript.js"></script>

<?php include("php/footer.php"); ?>

</body>
</html>