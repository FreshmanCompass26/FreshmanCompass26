<?php
include("conexion.php");

$query = "SELECT * FROM teachers";
$resultado = $conn->query($query);

if (!$resultado) {
    die("Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Teachers</title>

    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/teachers.css">
</head>

<body>

<?php include("navbar.php"); ?>

<div class="main">

    <h1>Conoce nuestros maestros</h1>
    <p>Nuestros profesores están aquí para guiarte, inspirarte y ayudarte a alcanzar tus metas</p>

    <!-- ✅ BOTONES CON FILTRO -->
    <div class="filtros">
        <button class="active" onclick="filtrar('all', this)">Todos los maestros</button>
        <button onclick="filtrar('English', this)">English</button>
        <button onclick="filtrar('Computing', this)">Computing</button>
        <button onclick="filtrar('Values', this)">Values</button>
        <button onclick="filtrar('Administración', this)">Administración</button>
    </div>

    <div class="cards">

        <?php while($row = $resultado->fetch_assoc()) { ?>

        <!-- ✅ data-materia conecta botón con card -->
        <div class="card" data-materia="<?php echo $row['materia']; ?>">

            <div class="img-container">
                <img src="../img/<?php echo $row['imagen']; ?>" class="foto">
            </div>

            <h3><?php echo $row['nombre']; ?></h3>
            <span class="materia"><?php echo $row['materia']; ?></span>

            <div class="info">
                <p><?php echo $row['correo']; ?></p>
                <p><?php echo $row['dias']; ?></p>
                <p><?php echo $row['horario']; ?></p>
            </div>

            <div class="fecha"><?php echo $row['cumple']; ?></div>

            <div class="frase">
                "<?php echo $row['frase']; ?>"
            </div>

        </div>

        <?php } ?>

    </div>

    <div class="btn-container">
        <button id="verMas" class="vermas">Ver más</button>
    </div>

</div>

<!-- ✅ SCRIPT FILTROS + VER MÁS -->
<script>

// ✅ FILTRO POR MATERIA
function filtrar(materia, boton) {

    let cards = document.querySelectorAll(".card");

    cards.forEach(card => {
        if (materia === "all") {
            card.style.display = "block";
        } else if (card.getAttribute("data-materia") === materia) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });

    // ✅ cambiar botón activo
    document.querySelectorAll(".filtros button").forEach(btn => {
        btn.classList.remove("active");
    });

    boton.classList.add("active");
}


// ✅ VER MÁS (solo si estás en "todos")
document.getElementById("verMas").addEventListener("click", function(){

    let hidden = document.querySelectorAll(".card");

    hidden.forEach(card => {
        card.style.display = "block";
    });

    this.style.display = "none";

});

</script>

</body>
</html>