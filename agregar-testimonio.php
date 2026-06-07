<?php
session_start();

$pagina_actual = "centro";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Testimonio</title>

    <link rel="stylesheet" href="styles/agregar-testimonio.css">
    <link rel="stylesheet" href="styles/navbar.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-dark shadow-sm py-3 px-4">
 
    <div class="container-fluid">
 
        <a class="navbar-brand fw-bold fs-3 text-warning" href="#">
            HomePage
        </a>
 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarContenido">
            <span class="navbar-toggler-icon"></span>
        </button>
 
        <div class="collapse navbar-collapse" id="navbarContenido">
 
            <div class="mx-auto w-50">
                <input type="text"
                    class="form-control rounded-pill px-4"
                    placeholder="Buscar...">
            </div>
 
            <div class="d-flex align-items-center gap-3 ms-auto">
 
                

<?php if (isset($_SESSION['nombre'])): ?>

    <div class="user-box">
         <?php echo $_SESSION['nombre']; ?>
    </div>

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
   
            <div class="d-flex align-items-center gap-3">
 
</nav>

<div class="container-fluid p-0">
    <div class="row g-0">

        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <?php include 'php/navbar.php'; ?>
        </div>

<div class="contenedor">

    <div class="header-testimonio">

        <div class="titulo">
            <h1>Voces que</h1>
            <h2>Inspiran</h2>

            <div class="linea"></div>

            <p>
                Tu historia puede motivar y dar esperanza a otros estudiantes.
                Comparte tu experiencia y sé parte del cambio.
            </p>
        </div>

        <div class="banner">
            <img src="img/testimonios-banner.png" alt="">
        </div>

    </div>

    <form action="guardar-testimonio.php" method="POST" enctype="multipart/form-data">

        <div class="contenido-formulario">

            <div class="lado-izquierdo">

                <div class="campo">
                    <label>Tu nombre</label>

                    <input
                        type="text"
                        name="nombre"
                        placeholder="Escribe tu nombre..."
                        required>
                </div>

                <div class="campo">
                    <label>Año de graduación</label>

                    <select name="anio_graduacion" required>

                        <option value="">Selecciona tu año de graduación</option>

                        <?php
                        $anioActual = date("Y");

                        for($i = $anioActual; $i >= 2010; $i--){
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>

                    </select>
                </div>

                <div class="campo">

                    <label>Tu testimonio</label>

                    <textarea
                        name="testimonio"
                        maxlength="500"
                        placeholder="Comparte tu experiencia, lo que aprendiste, tus retos y lo que recomendarías a otros..."
                        required></textarea>

                    <small>0/500 caracteres</small>

                </div>

            </div>

            <div class="lado-derecho">

                <div class="foto-box">

                    <label>Sube tu foto</label>

                    <div class="preview-foto">

                        <img
                            id="preview"
                            src="img/avatar.png"
                            alt="Foto">

                    </div>

                    <input
                        type="file"
                        id="foto"
                        name="foto"
                        accept="image/*"
                        required>

                </div>

                <div class="info-box">

                    <h3>Consejos para tu testimonio</h3>

                    <ul>
                        <li>Sé sincero y cuenta tu historia.</li>
                        <li>Habla de los retos que superaste.</li>
                        <li>Tu consejo puede ayudar a otros estudiantes.</li>
                    </ul>

                </div>

            </div>

        </div>

        <div class="puntuacion-box">

            <label>¡Puntúa tu experiencia!</label>

            <div class="rating">

                <input type="radio" name="puntuacion" id="star5" value="5" required>
                <label for="star5">★</label>

                <input type="radio" name="puntuacion" id="star4" value="4">
                <label for="star4">★</label>

                <input type="radio" name="puntuacion" id="star3" value="3">
                <label for="star3">★</label>

                <input type="radio" name="puntuacion" id="star2" value="2">
                <label for="star2">★</label>

                <input type="radio" name="puntuacion" id="star1" value="1">
                <label for="star1">★</label>

            </div>

        </div>

        <div class="botones">

            <button type="reset" class="btn-cancelar">
                Cancelar
            </button>

            <button type="submit" class="btn-publicar">
                Publicar testimonio
            </button>

        </div>

    </form>

</div>

<script src="js/testimoniosjs"></script>
</body>
</html>