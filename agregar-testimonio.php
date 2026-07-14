<?php
session_start();
$pagina_actual = "centro"; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Testimonio - Freshman Compass</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="styles/agregar-testimonio.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="icon" type="favicon" href="img/favicon.png">
</head>
<body>

<div class="layout-principal">

    <aside class="sidebar-izquierda">
        <?php include 'php/navbar.php'; ?>
    </aside>

    <main class="contenido-derecha">
        
        <header class="header-usuario">
            <div class="user-profile-box">
                <?php if (isset($_SESSION['nombre'])): ?>
                    <div class="user-avatar-circle">
                        <?php echo strtoupper(substr($_SESSION['nombre'], 0, 1)); ?>
                    </div>
                    <span class="user-name"><?php echo $_SESSION['nombre']; ?></span>
                    <a href="php/logout.php" class="btn-logout-link"><i class="fa-solid fa-arrow-right-from-bracket"></i> Salir</a>
                <?php else: ?>
                    <a href="login.html" class="btn-login-simple">Iniciar sesión</a>
                <?php endif; ?>
            </div>
        </header>

        <div class="contenedor-formulario-real">
            
            <div class="header-testimonio">
                <div class="titulo">
                    <h1>Voces que</h1>
                    <h2 class="texto-hueco">Inspiran</h2>
                    <div class="linea"></div>
                    <p>Tu historia puede motivar y dar esperanza a otros estudiantes. Comparte tu experiencia y sé parte del cambio.</p>
                </div>
            </div>

            <form action="php/guardar-testimonio.php" method="POST" enctype="multipart/form-data">
                <div class="contenido-formulario">
                    
                    <div class="lado-izquierdo">
                        <div class="campo">
                            <label>Tu nombre</label>
                            <div class="wrapper-input">
                                <span class="icono-placeholder"><i class="fa-solid fa-user"></i></span>
                                <input type="text" name="nombre" placeholder="Escribe tu nombre..." required>
                            </div>
                        </div>

                        <div class="campo">
                            <label>Año de graduación</label>
                            <div class="wrapper-input">
                                <span class="icono-placeholder"><i class="fa-solid fa-graduation-cap"></i></span>
                                <select name="anio_graduacion" required>´

                                    <option value="">Selecciona tu año de graduación</option>
                                    <option value="">No aplica</option>
                                    <?php
                                    $anioActual = date("Y");
                                    for($i = $anioActual; $i >= 2010; $i--){
                                        echo "<option value='$i'>$i</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="campo">
                            <label>Tu testimonio</label>
                            <div class="wrapper-textarea">
                                <span class="comilla-decorativa">“</span>
                                <textarea name="testimonio" maxlength="5000
                                " placeholder="Comparte tu experiencia en los salones..." required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="lado-derecho">
                        <div class="foto-box">
                            <label>Sube tu foto</label>
                            <div class="avatar-container">
                                <div class="preview-foto">
                                    <img id="preview" src="img/sinfoto.jpeg" alt="Foto por defecto">
                                </div>
                                <label for="foto" class="badge-mas"><i class="fa-solid fa-camera"></i></label>
                                <input type="file" id="foto" name="foto" accept="image/*" style="display:none;" onchange="previewImage(event)">
                            </div>
                        </div>

                        <div class="info-box">
                            <h3>Consejos para tu testimonio</h3>
                            <ul>
                                <li>
                                    <span class="bullet-blue"><i class="fa-solid fa-comment"></i></span> 
                                    <div><strong>Sé sincero:</strong> Cuenta lo que más te gustó de tu experiencia.</div>
                                </li>
                                <li>
                                    <span class="bullet-blue"><i class="fa-solid fa-lightbulb"></i></span> 
                                    <div><strong>Habla de retos:</strong> Describe cómo superaste los obstáculos académicos.</div>
                                </li>
                                <li>
                                    <span class="bullet-blue"><i class="fa-solid fa-users"></i></span> 
                                    <div>Tu opinión guiará a las nuevas generaciones.</div>
                                </li>
                            </ul>
                        </div>

                        <div class="alerta-seguridad">
                            <span class="icono-alerta"><i class="fa-solid fa-shield-halved"></i></span>
                            <p>Por seguridad comunitaria, todos los testimonios pasan por una revisión breve antes de publicarse.</p>
                        </div>
                    </div>

                </div>

                <div class="seccion-inferior-formulario">
                    <div class="puntuacion-box">
                        <label>¡Puntúa tu experiencia!</label>
                        <div class="rating">
                            <input type="radio" name="puntuacion" id="star5" value="5" required><label for="star5">★</label>
                            <input type="radio" name="puntuacion" id="star4" value="4"><label for="star4">★</label>
                            <input type="radio" name="puntuacion" id="star3" value="3"><label for="star3">★</label>
                            <input type="radio" name="puntuacion" id="star2" value="2"><label for="star2">★</label>
                            <input type="radio" name="puntuacion" id="star1" value="1"><label for="star1">★</label>
                        </div>
                    </div>

                    <div class="botones">
                        <button type="reset" class="btn-cancelar">Cancelar</button>
                        <button type="submit" class="btn-publicar">Enviar testimonio <span class="flecha-btn">→</span></button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>

<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const output = document.getElementById('preview');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
</body>
</html>