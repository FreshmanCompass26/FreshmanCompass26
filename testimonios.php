<?php
session_start();
$pagina_actual = "centro"; 

$conexion = new mysqli("localhost", "root", "", "freshman_db");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$query = "SELECT nombre, anio_graduacion, testimonio, foto, puntuacion FROM testimonios ORDER BY id DESC";
$resultado = $conexion->query($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonios - Voces que Inspiran</title>
    <link rel="stylesheet" href="styles/testimonios.css">
    <link rel="stylesheet" href="styles/navbar.css">
</head>
<body>

<div class="layout-principal">

    <aside class="sidebar-izquierda">
        <?php include 'php/navbar.php'; ?>
    </aside>

    <main class="contenido-derecha">
        
        <div class="header-testimonio">
            <div class="titulo">
                <h1>Voces que</h1>
                <h2 class="texto-hueco">Inspiran</h2>
                <div class="linea"></div>
                <p>Conoce a los graduados cuya vida cambió gracias a Súperate y que hoy avanzan con confianza hacia su futuro.</p>
            </div>
            
            <div class="decoracion-globos-vista">
                <div class="globo-azul-stars">
                    <span class="comillas">“</span> ★★★★★ <span class="comillas">”</span>
                </div>
                <div class="globo-blanco-lineas">
                    <span class="comillas">“</span> ─── ─── <span class="comillas">”</span>
                </div>
            </div>
        </div>

        <section class="grid-testimonios">
            <?php 
            if ($resultado && $resultado->num_rows > 0):
                while($row = $resultado->fetch_assoc()): 
                    
                    // SEGURIDAD EXTRA: Validamos que el campo no esté vacío Y QUE EL ARCHIVO REALMENTE EXISTA
                    if (!empty($row['foto']) && file_exists($row['foto'])) {
                        $rutaFoto = $row['foto'];
                    } else {
                        // Si no hay foto o el archivo se borró/no existe, usa la de perfil por defecto
                        $rutaFoto = 'img/perfil.png';
                    }
                    
                    $puntuacion = intval($row['puntuacion']);
            ?>
                <div class="tarjeta-testimonio">
                    
                    <div class="tarjeta-header">
                        <div class="avatar-usuario">
                            <img src="<?php echo htmlspecialchars($rutaFoto); ?>" alt="Foto de <?php echo htmlspecialchars($row['nombre']); ?>">
                        </div>
                        <div class="info-usuario">
                            <h3><?php echo htmlspecialchars($row['nombre']); ?></h3>
                            <p>Graduado de la Promo <?php echo htmlspecialchars($row['anio_graduacion']); ?></p>
                        </div>
                    </div>

                    <div class="estrellas-puntuacion">
                        <?php 
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $puntuacion) {
                                echo '<span class="estrella llena">★</span>';
                            } else {
                                echo '<span class="estrella vacia">★</span>';
                            }
                        }
                        ?>
                    </div>

                    <div class="tarjeta-cuerpo">
                        <p><?php echo nl2br(htmlspecialchars($row['testimonio'])); ?></p>
                    </div>

                </div>
            <?php 
                endwhile; 
            else: 
            ?>
                <div class="sin-testimonios">
                    <p>Aún no hay testimonios publicados. ¡Sé el primero en compartir tu experiencia!</p>
                </div>
            <?php endif; ?>
        </section>

        <footer class="banner-compartir">
            <div class="banner-izquierdo">
                <div class="icono-banner">💙</div>
                <div class="texto-banner">
                    <h3>Comparte tu historia</h3>
                    <p>Tu opinión puede ayudar a otro Freshman!</p>
                </div>
            </div>
            <div class="banner-derecho">
                <a href="agregar-testimonio.php" class="btn-dejar-testimonio">
                    Dejar un testimonio <span class="flecha-btn">➔</span>
                </a>
            </div>
        </footer>

    </main>
</div>

</body>
</html>
<?php $conexion->close(); ?>