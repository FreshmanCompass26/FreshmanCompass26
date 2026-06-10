<?php
$conexion = mysqli_connect("localhost","root","","consejos");

if(!$conexion){
    die("Error de conexión");
}

$sql = "SELECT * FROM consejos";
$resultado = mysqli_query($conexion,$sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Freshman Compass - Consejos</title>

<link rel="stylesheet" href="../styles/consejos.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<div class="container">

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

            <a href="#" class="active">
                <i class="fas fa-heart"></i> Consejos
            </a>

            <a href="#"><i class="fas fa-comment"></i> Comentarios</a>
            <a href="#"><i class="fas fa-building"></i> Nuestro Centro</a>
        </nav>

        <div class="quote">
            Success start<br>
            with the decision<br>
            to try.
        </div>

    </aside>

    <main class="main-content">

        <header class="topbar">

            <div class="search-box">
                    <form method="GET" class="search-box">
                    <input type="text" name="buscar" placeholder="Buscar consejos..."
                    value="<?php echo isset($_GET['buscar']) ? $_GET['buscar'] : ''; ?>">
                    <i class="fas fa-search"></i>
                </form>
            </div>

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

                <h3>
                    🟢 Estos son nuestros consejos,
                    despliega para poder verlos todos.
                </h3>

                <p>
                    <span class="badge">1</span>
                    Practica nuevo vocabulario de acuerdo con tu nivel de inglés para ponerlo en práctica todos los días al hablarlo.
                </p>

                <p>
                    <span class="badge">2</span>
                    ¡Nunca te quedes con dudas! Acércate a tu profesor, siempre estará ahí para ayudarte.
                </p>

            </div>

            <div class="tips-grid">

                <?php
                $contador = 0;

                while($fila = mysqli_fetch_assoc($resultado)){
                ?>

                <div class="tip-card <?php echo ($contador >= 4) ? 'oculto' : ''; ?>">

                    <span class="number">
                        <?php echo $fila['id']; ?>
                    </span>

                    <div class="tip-text">

                        <h4>
                            <?php echo $fila['titulo']; ?>
                        </h4>

                        <p>
                            <?php echo $fila['descripcion']; ?>
                        </p>

                    </div>

                    <div class="tip-img">

                        <img
                        src="../img/<?php echo $fila['imagen']; ?>"
                        alt="<?php echo $fila['titulo']; ?>">

                    </div>

                </div>

                <?php
                $contador++;
                }
                ?>

            </div>
            <div class="decoracion-consejos">

                    <div class="linea linea-izq-1"></div>
                    <div class="linea linea-izq-2"></div>


                <div class="linea linea-der-1"></div>
                <div class="linea linea-der-2"></div>

            </div>
            <div class="button-container">
                <button id="showMoreBtn">
                    Ver más...
                </button>
            </div>

        </section>

    </main>

</div>

<script>

const boton = document.getElementById("showMoreBtn");
const ocultos = document.querySelectorAll(".oculto");

let abiertos = false;

boton.addEventListener("click", () => {

    ocultos.forEach(card => {

        if(abiertos){
            card.style.display = "none";
        }else{
            card.style.display = "flex";
        }

    });

    abiertos = !abiertos;

    boton.textContent =
        abiertos ? "Ver menos" : "Ver más...";
});

</script>

</body>
</html>