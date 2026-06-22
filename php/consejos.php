<?php
include("conexion.php");
include("navbar.php");

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
    <title>Consejos</title>
    <link rel="stylesheet" href="../styles/consejos.css">
    <link rel="stylesheet" href="../styles/navbar.css">
</head>
<body>

<div class="contenido">

    <div class="titulo">
        <div class="bombilla">💡</div>
        <h1>Consejos</h1>
    </div>

    <div class="banner-consejo">

        <h3>
            🟢 Estos son nuestros consejos, despliega para poder verlos todos.
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
                    <img src="../img/<?php echo $fila['imagen']; ?>" alt="">
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

</body>
</html>