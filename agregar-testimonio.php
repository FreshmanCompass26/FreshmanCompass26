<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Testimonio</title>

    <link rel="stylesheet" href="styles/agregar-testimonio.css">
</head>
<body>

<div class="contenedor">

    <h1>Comparte tu experiencia</h1>

    <form action="guardar-testimonio.php" method="POST" enctype="multipart/form-data">

        <!-- Nombre -->
        <div class="campo">
            <label>Tu nombre</label>
            <input
                type="text"
                name="nombre"
                placeholder="Escribe tu nombre..."
                required
            >
        </div>

        <!-- Año -->
        <div class="campo">
            <label>Año de graduación</label>

            <select name="anio_graduacion" required>

                <option value="">Selecciona un año</option>

                <?php
                $anioActual = date("Y");

                for($i = $anioActual; $i >= 2010; $i--){
                    echo "<option value='$i'>$i</option>";
                }
                ?>

            </select>
        </div>

        <!-- Foto -->
        <div class="campo">
            <label>Sube tu foto</label>

            <input
                type="file"
                name="foto"
                accept="image/*"
                required
            >
        </div>

        <!-- Testimonio -->
        <div class="campo">
            <label>Tu testimonio</label>

            <textarea
                name="testimonio"
                maxlength="500"
                placeholder="Comparte tu experiencia, lo que aprendiste y tus recomendaciones..."
                required
            ></textarea>

            <small>Máximo 500 caracteres</small>
        </div>

        <!-- Puntuación -->
        <div class="campo">
    <label>Puntúa tu experiencia</label>

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

        <!-- Botones -->
        <div class="botones">

            <button type="reset">
                Cancelar
            </button>

            <button type="submit">
                Publicar testimonio →
            </button>

        </div>

    </form>

</div>

</body>
</html>