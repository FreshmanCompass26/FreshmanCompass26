<?php

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST['nombre']);
    $anio_graduacion = $_POST['anio_graduacion'];
    $testimonio = trim($_POST['testimonio']);
    $puntuacion = $_POST['puntuacion'];

    $foto = $_FILES['foto'];

    if ($foto['error'] == 0) {

        $nombreFoto = time() . "_" . basename($foto['name']);

        $rutaDestino = "uploads/" . $nombreFoto;

        move_uploaded_file(
            $foto['tmp_name'],
            $rutaDestino
        );

        $sql = "INSERT INTO testimonios
        (nombre, anio_graduacion, foto, testimonio, puntuacion)
        VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "sissi",
            $nombre,
            $anio_graduacion,
            $rutaDestino,
            $testimonio,
            $puntuacion
        );

        if ($stmt->execute()) {

            header("Location: testimonios.php");
            exit();

        } else {

            echo "Error al guardar el testimonio.";

        }

    } else {

        echo "Error al subir la foto.";

    }

}

?>