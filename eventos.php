<?php
session_start();

$pagina_actual = "eventos";

include "php/conexion.php";

$sql = "SELECT * FROM eventos ORDER BY evento_ID ASC LIMIT 4";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Eventos | Freshman Compass</title>

<link rel="stylesheet" href="styles/eventos.css">
<link rel="stylesheet" href="styles/navbar.css">
<link rel="stylesheet" href="styles/footer.css">
<link rel="icon" type="favicon" href="img/favicon.png">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">



</head>

<body>

<?php include "php/navbar.php"; ?>

<div class="main-content">

    <div class="hero">
        <h1>Eventos</h1>

        <p>
            Descubre todas las actividades, celebraciones y experiencias
            que forman parte de la vida estudiantil en nuestro centro.
        </p>
    </div>
    
    <div class="events-grid">

        <?php while($evento = $result->fetch_assoc()) { ?>

        <div class="event-card">

            <img
                src="img/<?php echo $evento['imagen']; ?>"
                alt="<?php echo $evento['nombre']; ?>"
                class="event-img"
            >

            <div class="event-content">

                <div class="event-date">
                    <i class="fa-solid fa-calendar-days"></i>

                    <?php
                    echo date(
                        "d/m/Y",
                        strtotime($evento['fecha'])
                    );
                    ?>
                </div>

                <h2>
                    <?php echo $evento['nombre']; ?>
                </h2>

                <div class="event-location">
                    <i class="fa-solid fa-location-dot"></i>
                    <?php echo $evento['ubicacion']; ?>
                </div>

                <p>
                    <?php echo $evento['descripcion']; ?>
                </p>

                <a
                    href="<?php echo $evento['enlace']; ?>"
                    target="_blank"
                    class="event-btn"
                >
                    Ver fotos
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

            </div>

        </div>

        <?php } ?>

    </div>

    <div class="more-container">
        <a href="./mas-eventos.php" class="more-btn">
            Ver más eventos
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>



</div>


<?php include 'php/footer.php'; ?>
</body>
</html>