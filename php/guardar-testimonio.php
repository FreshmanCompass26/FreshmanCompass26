<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST['nombre']);
    $anio_graduacion = intval($_POST['anio_graduacion']);
    $testimonio = trim($_POST['testimonio']);
    $puntuacion = intval($_POST['puntuacion']);


    $rutaDestino = ""; 

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        
        $foto = $_FILES['foto'];
        
        $carpetaUploads = "../uploads/";

        if (!file_exists($carpetaUploads)) {
            mkdir($carpetaUploads, 0777, true);
        }

        $nombreFoto = time() . "_" . basename($foto['name']);
        
        $rutaFisicaDestino = $carpetaUploads . $nombreFoto;

        $tipoArchivo = $foto['type'];
        $permitidos = array("image/jpeg", "image/png", "image/jpg", "image/webp");

        if (in_array($tipoArchivo, $permitidos)) {
            if (move_uploaded_file($foto['tmp_name'], $rutaFisicaDestino)) {
                $rutaDestino = "uploads/" . $nombreFoto;
            }
        }
    }

    $sql = "INSERT INTO testimonios (nombre, anio_graduacion, foto, testimonio, puntuacion) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
   
        $stmt->bind_param(
            "sissi",
            $nombre,
            $anio_graduacion,
            $rutaDestino,
            $testimonio,
            $puntuacion
        );

        if ($stmt->execute()) {
            header("Location: ../testimonios.php");
            exit();
        } else {
            echo "Error al guardar el testimonio en la base de datos.";
        }
        
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }
}

$conn->close();
?>