<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="home-page.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="footer.css">
   
</head>
<body>
    <!-- NAVBAR COMPLETO -->
<nav class="navbar navbar-expand-lg navbar-light navbar-dark shadow-sm py-3 px-4">
 
    <div class="container-fluid">
 
        <!-- LOGO -->
        <a class="navbar-brand fw-bold fs-3 text-warning" href="#">
            HomePage
        </a>
 
        <!-- BOTÓN RESPONSIVE -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarContenido">
            <span class="navbar-toggler-icon"></span>
        </button>
 
        <!-- CONTENIDO -->
        <div class="collapse navbar-collapse" id="navbarContenido">
 
            <!-- BUSCADOR CENTRO -->
            <div class="mx-auto w-50">
                <input type="text"
                    class="form-control rounded-pill px-4"
                    placeholder="Buscar...">
            </div>
 
            <!-- DERECHA -->
            <div class="d-flex align-items-center gap-3 ms-auto">
 
                

<?php if (isset($_SESSION['nombre'])): ?>

    <!-- USER -->
    <div class="user-box">
        👤 <?php echo $_SESSION['nombre']; ?>
    </div>

    <!-- BOTÓN -->
    <a href="php/logout.php" class="btn btn-logout">
        Cerrar sesión
    </a>

<?php else: ?>

    <a href="login.html" class="btn btn-warning rounded-pill">
        Iniciar sesión
    </a>

    <a href="signup.html" class="btn btn-outline-warning rounded-pill">
        Crear cuenta
    </a>

<?php endif; ?>
            </div>
 
        </div>
 
    </div>
 
</nav>
   
 
            <!-- DERECHA -->
            <div class="d-flex align-items-center gap-3">
 
                
 
    
 
</nav>

<div class="container-fluid p-0">
    <div class="row g-0">

        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <?php include 'php/navbar.php'; ?>
        </div>
        

        <!-- Contenido -->
        <div class="col-md-10 main-content">

           

            <!-- Banner -->
            <section class="banner-section">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>Tu viaje<br>comienza <span>aquí</span></h1>
                        <p>
                            Fortalece competencias digitales mientras exploras tu futuro académico y profesional.
                        </p>
                        <button class="btn btn-warning">Comienza</button>
                    </div>

                    <div class="col-md-6 text-center">
                        <img src="img/fox.jpeg" class="img-fluid banner-img">
                    </div>
                </div>
            </section>

            <!-- Tarjetas -->
            <section class="cards-section container mt-4">
                <div class="row g-4 justify-content-center">

                    <div class="col-md-3">
                        <div class="info-card">
                            <i class="bi bi-people-fill"></i>
                            <h5>Tutores</h5>
                            <p>Apoyo educativo y acompañamiento constante.</p>
                        </div>
                    </div>
                        <div class="col-md-3">
                        <div class="info-card">
                            <i class="bi bi-calendar-event-fill"></i>
                            <h5>Eventos</h5>
                            <p>Conoce talleres y actividades educativas.</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="info-card">
                            <i class="bi bi-lightbulb-fill"></i>
                            <h5>Proyectos</h5>
                            <p>Participa en experiencias innovadoras.</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="info-card">
                            <i class="bi bi-journal-bookmark-fill"></i>
                            <h5>Recursos</h5>
                            <p>Materiales y contenido para aprender.</p>
                        </div>
                        </div>

                </div>
            </section>

            <!-- Beneficios -->
           <section class="benefits-section">

    <h3 class="title-box">Beneficios</h3>

    <div class="benefits-container">

        <!-- FILA 1 -->
        <div class="row-benefits">

            <!-- CARD GRANDE IZQUIERDA -->
            <div class="student-card">
                <p>
                    Mi experiencia en el programa ¡Supérate! fue muy placentera...
                </p>
            </div>

            <!-- DERECHA -->
            <div class="right-cards">

                <div class="benefit-card">
                    <h4>Inglés intensivo</h4>
                    <p>Mejora tu nivel de inglés hasta poder comunicarte con confianza.</p>
                </div>

                <div class="benefit-card">
                    <h4>Habilidades tecnológicas</h4>
                    <p>Aprende herramientas digitales esenciales para el mundo actual.</p>
                </div>

            </div>

        </div>

        <!-- FILA 2 -->
        <div class="row-benefits">

            <!-- CARD ANCHA -->
            <div class="benefit-card wide">
                <h4>Desarrollo personal</h4>
                <p>Fortalece tu liderazgo y disciplina.</p>
            </div>

            <!-- CARD DERECHA -->
            <div class="student-card small">
                <p>Lorem ipsum dolor sit amet...</p>
            </div>

        </div>

        <!-- FILA 3 -->
        <div class="benefit-card wide">
            <h4>Oportunidades profesionales</h4>
            <p>Conecta con nuevas experiencias educativas.</p>
        </div>

    </div>

</section>

            <!-- Footer -->
             <?php include 'php/footer.php'; ?>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/app.js"></script>

</body>
</html>