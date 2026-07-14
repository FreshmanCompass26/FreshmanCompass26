<?php
include("php/conexion.php");


$mostrarTodos = isset($_GET['todos']);

$sqlTop = "SELECT * FROM consejos WHERE id <= 2 ORDER BY id ASC";
$topConsejos = $conn->query($sqlTop);

$limite = $mostrarTodos ? 50 : 4;

$sqlCards = "SELECT * FROM consejos
             WHERE id > 2
             ORDER BY id ASC
             LIMIT $limite";

$resultado = $conn->query($sqlCards);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consejos</title>

    <link rel="stylesheet" href="styles/consejos.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" type="image/png" href="img/favicon.png?v=1">
    <link rel="stylesheet" href="styles/footer.css">
</head>

<body>
<?php include("php/navbar.php"); ?>

<div class="contenido">

    <div class="titulo">
   <h1>Consejos</h1>
    </div>

    <div class="banner-consejo">

        <h3>
            <i class="fa-solid fa-circle-info"></i> Estos son nuestros consejos, despliega para poder verlos todos.
        </h3>

        <?php while($top = $topConsejos->fetch_assoc()){ ?>

            <div class="tip-superior">

                <span class="numero-verde">
                    <?php echo $top['id']; ?>
                </span>

                <p>
                    <?php echo $top['descripcion']; ?>
                </p>

            </div>

        <?php } ?>

    </div>

    <div class="consejos-container">

        <?php while($fila = $resultado->fetch_assoc()){ ?>

            <?php
            if($fila['id'] == 3){
            ?>

            <div class="psicologas-card">

                <div class="psicologas-info">

                    <h2>
                        <i class="fa-solid fa-comments"></i>
                        ¿Necesitas hablar con alguien?
                    </h2>

                    <p>
                        Si necesitas orientación o apoyo emocional, nuestro equipo de psicología está disponible para escucharte y acompañarte.
                    </p>

                    <a href="psicologas.php" class="btn-psicologas">
                        Conocer al equipo de psicología
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </div>

                <div class="psicologas-img">

                    <img src="img/psicologas.png" alt="Psicóloga hablando con estudiante">

                </div>

            </div>

            <?php } ?>

            <div class="card">

                <div class="numero">
                    <?php echo $fila['id']; ?>
                </div>

                <div class="info">

                    <h3>
                        <?php echo $fila['titulo']; ?>
                    </h3>

                    <p>
                        <?php echo $fila['descripcion']; ?>
                    </p>

                </div>

                <div class="imagen">

                    <img src="img/<?php echo $fila['imagen']; ?>" alt="">

                </div>

            </div>

        <?php } ?>

    </div>

    <div class="botones">

        <?php if(!$mostrarTodos){ ?>

            <a href="consejos.php?todos=1" class="btn">
                Ver más...
            </a>

        <?php } else { ?>

            <a href="consejos.php" class="btn">
                Volver al principio
            </a>

        <?php } ?>

    </div>

</div>

<?php include 'php/footer.php'; ?>

</body>
</html>