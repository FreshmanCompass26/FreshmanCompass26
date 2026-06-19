<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $anio_graduacion = mysqli_real_escape_string($conn, $_POST['anio_graduacion']);
    $testimonio = mysqli_real_escape_string($conn, $_POST['testimonio']);
    $puntuacion = intval($_POST['puntuacion']);
    
    $ruta_foto = "img/perfil.png"; 

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $permitidos = array("jpg", "jpeg", "png", "webp");
        $nombre_archivo = $_FILES['foto']['name'];
        $ext = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));
        
        if (in_array($ext, $permitidos)) {
            $nuevo_nombre = time() . "_" . bin2hex(random_bytes(5)) . "." . $ext;
            $directorio_destino = "../img/" . $nuevo_nombre;
            
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $directorio_destino)) {
                $ruta_foto = "img/" . $nuevo_nombre;
            }
        }
    }

    $sql = "INSERT INTO testimonios (nombre, anio_graduacion, testimonio, foto, puntuacion) 
            VALUES ('$nombre', '$anio_graduacion', '$testimonio', '$ruta_foto', '$puntuacion')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../testimonios.php");
        exit();
    } else {
        echo "Error al guardar el testimonio: " . mysqli_error($conn);
    }
}
?>