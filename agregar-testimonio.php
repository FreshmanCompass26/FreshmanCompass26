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
    <link rel="stylesheet" href="styles/agregar-testimonio.css">
    <link rel="stylesheet" href="styles/navbar.css">
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
                    <a href="php/logout.php" class="btn-logout-link">Cerrar sesión</a>
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
                                <span class="icono-placeholder">👤</span>
                                <input type="text" name="nombre" placeholder="Escribe tu nombre..." required>
                            </div>
                        </div>

                        <div class="campo">
                            <label>Año de graduación</label>
                            <div class="wrapper-input">
                                <span class="icono-placeholder">🎓</span>
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
                        </div>

                        <div class="campo">
                            <label>Tu testimonio</label>
                            <div class="wrapper-textarea">
                                <span class="comilla-decorativa">“</span>
                                <textarea name="testimonio" maxlength="500" placeholder="Comparte tu experiencia..." required></textarea>
                            </div>
                            <small>0/500 caracteres</small>
                        </div>
                    </div>

                    <div class="lado-derecho">
                        <div class="foto-box">
                            <label>Sube tu foto</label>
                            <div class="avatar-container">
                                <div class="preview-foto">
                                    <img id="preview" src="img/perfil.png" alt="Foto">
                                </div>
                                <label for="foto" class="badge-mas">+</label>
                                <input type="file" id="foto" name="foto" accept="image/*" style="display:none;">
                            </div>
                        </div>

                        <div class="info-box">
                            <h3>Consejos para tu testimonio</h3>
                            <ul>
                                <li><span class="bullet-blue">💬</span> <div><strong>Sé sincero</strong> y cuenta tu historia.</div></li>
                                <li><span class="bullet-blue">💡</span> <div><strong>Habla de los retos</strong> superados.</div></li>
                                <li><span class="bullet-blue">👥</span> <div>Tu consejo puede ayudar a otros.</div></li>
                            </ul>
                        </div>

                        <div class="alerta-seguridad">
                            <span class="icono-alerta">🛡️</span>
                            <p>Todos los testimonios son revisados antes de publicarse.</p>
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
                        <button type="reset" class="btn-cancelar">cancelar</button>
                        <button type="submit" class="btn-publicar">Publicar testimonio <span class="flecha-btn">→</span></button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>

</body>
</html>