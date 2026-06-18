<?php
$conexion = mysqli_connect("localhost","root","","fcompass_db");

if(!$conexion){
    die("Error de conexión: " . mysqli_connect_error());
}

$buscar = "";

/* BUSCADOR */
if(isset($_GET['buscar']) && $_GET['buscar'] != ''){
    $buscar = mysqli_real_escape_string($conexion, $_GET['buscar']);

    $sql = "SELECT * FROM consejos 
            WHERE titulo LIKE '%$buscar%' 
            OR descripcion LIKE '%$buscar%'";
}else{
    $sql = "SELECT * FROM consejos";
}

$resultado = mysqli_query($conexion, $sql);

if(!$resultado){
    die("Error en la consulta: " . mysqli_error($conexion));
}

/* GUARDAR RESULTADOS */
$cards = [];
while($fila = mysqli_fetch_assoc($resultado)){
    $cards[] = $fila;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Consejos - Freshman Compass</title>

<link rel="stylesheet" href="../styles/consejos.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<div class="container">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="logo">
            <img src="../img/logo.jpeg" alt="">
            <h3>Freshman Compass</h3>
        </div>

        <nav>
            <a href="../index.php"><i class="fas fa-home"></i> Inicio</a>
            <a href="#"><i class="fas fa-user"></i> Perfil</a>
            <a href="teachers.php"><i class="fas fa-chalkboard-teacher"></i> Profesores</a>
            <a href="#"><i class="fas fa-calendar"></i> Eventos</a>
            <a href="#" class="active"><i class="fas fa-heart"></i> Consejos</a>
            <a href="#"><i class="fas fa-comment"></i> Comentarios</a>
            <a href="#"><i class="fas fa-building"></i> Centro</a>
        </nav>

        <div class="quote">
            Success starts<br>
            with the decision<br>
            to try.
        </div>
    </aside>

    <!-- MAIN -->
    <main class="main-content">

        <header class="topbar">
            <form method="GET" class="search-box">
                <input type="text" name="buscar" placeholder="Buscar consejos..."
                value="<?php echo htmlspecialchars($buscar); ?>">
                <i class="fas fa-search"></i>
            </form>

            <div class="top-icons">
                <i class="fas fa-bell"></i>
                <img src="../img/logo.jpeg" class="avatar">
            </div>
        </header>

        <section class="content">

            <div class="title-area">
                <span class="emoji">💡</span>
                <h1>Consejos</h1>
            </div>

            <div class="featured-card">
                <h3>Consejos para mejorar tu aprendizaje</h3>
                <p><span class="badge">1</span> Organiza tu tiempo diariamente</p>
                <p><span class="badge">2</span> Pregunta cuando tengas dudas</p>
            </div>

            <div class="tips-grid">

<?php
$index = 0;

foreach($cards as $i => $fila){

    $hue = ($i * 45) % 360;
    $visible = ($i < 8) ? "" : "oculto";
?>

<div class="tip-card <?php echo $visible; ?>"
     style="background: linear-gradient(135deg,
     hsl(<?php echo $hue; ?>, 45%, 92%),
     hsl(<?php echo $hue + 20; ?>, 45%, 85%));">

    <span class="number"
          style="background:hsl(<?php echo $hue; ?>, 60%, 55%);">
        <?php echo $fila['id']; ?>
    </span>

    <div class="tip-text">
        <h4><?php echo htmlspecialchars($fila['titulo']); ?></h4>
        <p><?php echo htmlspecialchars($fila['descripcion']); ?></p>

        <div class="meta">
            <span>📌 Consejo útil</span>
            <span>⏱ lectura rápida</span>
        </div>
    </div>

    <div class="tip-img">
        <img src="../img/<?php echo $fila['imagen']; ?>">
    </div>

</div>

<?php } ?>

            </div>

            <!-- BOTÓN -->
            <div class="button-container">
                <button id="showMoreBtn">Ver más</button>
            </div>

        </section>

    </main>

</div>

<!-- JS CONTROL BLOQUES -->
<script>
const boton = document.getElementById("showMoreBtn");
const cards = document.querySelectorAll(".tip-card");

let paso = 0;
const bloques = [8, 20, 30, 40, 50];

function actualizarVista(limite){
    cards.forEach((card, i) => {
        if(i < limite){
            card.classList.remove("oculto");
        } else {
            card.classList.add("oculto");
        }
    });
}

actualizarVista(bloques[0]);

boton.addEventListener("click", () => {

    paso++;

    if(paso >= bloques.length){
        paso = 0; // 🔄 volver al inicio
    }

    let mostrar = bloques[paso];

    actualizarVista(mostrar);

    if(paso === bloques.length - 1){
        boton.textContent = "Volver al principio";
    } else {
        boton.textContent = "Ver más";
    }

});
</script>

</body>
</html>