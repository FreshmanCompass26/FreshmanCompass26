<?php
session_start();
include "conexion.php";

// Verifica que sea método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener datos
    $usuario = $_SESSION['nombre'] ?? null;
    $psicologa = $_POST['psicologa'] ?? null;
    $fecha = $_POST['fecha'] ?? null;

    // VALIDAR DATOS
    if (empty($usuario) || empty($psicologa) || empty($fecha)) {
        echo "<script>
                alert('⚠️ Faltan datos para agendar la cita');
                window.history.back();
              </script>";
        exit();
    }

    // EVITAR CITAS DUPLICADAS (mismo usuario misma fecha)
    $check = "SELECT * FROM citas 
              WHERE usuario='$usuario' AND fecha='$fecha'";
    
    $resultado = $conn->query($check);

    if ($resultado->num_rows > 0) {
        echo "<script>
                alert('⚠️ Ya tienes una cita agendada ese día');
                window.history.back();
              </script>";
        exit();
    }

    // INSERTAR CITA
    $sql = "INSERT INTO citas (usuario, psicologa, fecha)
            VALUES ('$usuario', '$psicologa', '$fecha')";

    if ($conn->query($sql) === TRUE) {

        echo "<script>
                alert('✅ Cita agendada correctamente');
                window.location.href='agendar.php';
              </script>";

    } else {
        echo "Error al guardar: " . $conn->error;
    }

} else {
    echo "Acceso no permitido";
}
?>