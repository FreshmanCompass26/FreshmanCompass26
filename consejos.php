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

<link rel="stylesheet" href="styles/consejos.css">
<link rel="stylesheet" href="styles/footer.css">
 <link rel="stylesheet" href="styles/navbar.css">


<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<div class="container">

    <aside class="sidebar">

        <div class="logo">
            <img src="img/logo.jpeg">
            <h2>Freshman Compass</h2>
        </div>

        <nav>

            <a href="#">
                <i class="fas fa-home"></i>
                Inicio
            </a>

            <a href="#">
                <i class="fas fa-user"></i>
                Perfil
            </a>

            <a href="#">
                <i class="fas fa-users"></i>
                Profesores
            </a>

            <a href="#">
                <i class="fas fa-calendar"></i>
                Eventos
            </a>

            <a href="#" class="active">
                <i class="fas fa-heart"></i>
                Consejos
            </a>

            <a href="#">
                <i class="fas fa-comments"></i>
                Comentarios
            </a>

            <a href="#">
                <i class="fas fa-school"></i>
                Nuestro centro
            </a>

        </nav>

        <div class="quote">
            Success start with the decision to try.
        </div>

    </aside>

    <main class="main">

        <header class="topbar">

            <div class="search-box">

                <input
                type="text"
                id="searchInput"
                placeholder="Buscar consejos...">

                <i class="fas fa-search"></i>

            </div>

            <div class="top-icons">
                <i class="fas fa-bell"></i>
                <img src="img/avatar.png" class="avatar">
            </div>

        </header>

        <section class="content">

            <div class="title-section">

                <img
                src="img/foco.png"
                class="bulb">

                <h1>Consejos</h1>

            </div>

            <div class="featured">

                <h3>
                    🟢 Estos son nuestros consejos, despliega para poder verlos todos.
                </h3>

                <p>
                    <span class="badge">1</span>
                    Practica nuevo vocabulario de acuerdo con tu nivel de inglés.
                </p>

                <p>
                    <span class="badge">2</span>
                    Nunca te quedes con dudas. Acércate a tu profesor.
                </p>

            </div>

 <div class="page-topbar">
        <?php if (isset($_SESSION['nombre'])): ?>
            <?php
                $nombre  = $_SESSION['nombre'];
                $inicial = strtoupper(substr($nombre, 0, 1));
            ?>
            <div class="dropdown user-dropdown">
                <div class="user-trigger" data-bs-toggle="dropdown">
                    <div class="avatar"><?php echo $inicial; ?></div>
                    <span class="username"><?php echo htmlspecialchars($nombre); ?></span>
                    <i class="fa-solid fa-chevron-down" style="font-size:11px;color:#8a9bb0;"></i>
                </div>
                <ul class="dropdown-menu dropdown-menu-end custom-dropdown">
                    <li class="dropdown-header-user">
                        <div class="avatar-lg"><?php echo $inicial; ?></div>
                        <div>
                            <div class="name"><?php echo htmlspecialchars($nombre); ?></div>
                            <div class="sub">Estudiante</div>
                        </div>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="perfil.html">
                            <i class="fa-regular fa-user"></i> Perfil
                        </a>
                    </li>
                
                    <li>
                        <a class="dropdown-item logout" href="php/logout.php">
                            <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión
                        </a>
                    </li>
                </ul>
            </div>
        <?php else: ?>
            <a href="login.html"  class="btn-login">Iniciar sesión</a>
            <a href="signup.html" class="btn-signup">Crear cuenta</a>
        <?php endif; ?>
    </div>


            <div class="tips-grid" id="tipsGrid">

                <div class="tip-card">

                    <span class="number">4</span>

                    <div class="tip-info">

                        <div>
                            <h4>Organiza tu tiempo</h4>
                            <p>
                                Utiliza bien tu tiempo libre y prioriza actividades.
                            </p>
                        </div>

                        <img src="img/calendario.png">

                    </div>

                </div>

                <div class="tip-card">

                    <span class="number yellow">5</span>

                    <div class="tip-info">

                        <div>
                            <h4>Duerme adecuadamente</h4>
                            <p>
                                Dormir 8 horas ayuda a comenzar bien el día.
                            </p>
                        </div>

                        <img src="img/dormir.png">

                    </div>

                </div>

                <div class="tip-card">

                    <span class="number purple">6</span>

                    <div class="tip-info">

                        <div>
                            <h4>Siempre toma apuntes</h4>
                            <p>
                                Las notas ayudan a recordar información importante.
                            </p>
                        </div>

                        <img src="img/apuntes.png">

                    </div>

                </div>

                <div class="tip-card">

                    <span class="number green">7</span>

                    <div class="tip-info">

                        <div>
                            <h4>No te compares</h4>
                            <p>
                                Cada estudiante tiene su propio ritmo.
                            </p>
                        </div>

                        <img src="img/cerebro.png">

                    </div>

                </div>

            </div>

            <div class="btn-container">

                <button id="showTipsBtn">
                    Ver más...
                </button>

            </div>
            
        </section>

    </main>

</div>

<script src="Js/consejosscript.js"></script>
<?php include 'php/footer.php'; ?>
</body>
</html>