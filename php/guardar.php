<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    exit("Debes iniciar sesión para agendar una cita.");
}

include("conexion.php");

$id_psicologa = isset($_POST['psicologa']) ? intval($_POST['psicologa']) : 0;
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
$hora = isset($_POST['hora']) ? $_POST['hora'] : '';
$motivo = isset($_POST['motivo']) ? $_POST['motivo'] : '';
$usuario_estudiante = $_SESSION['nombre'] ?? 'Estudiante';

if ($id_psicologa === 0 || empty($fecha) || empty($hora)) {
    exit("Datos incompletos.");
}

$sql_check = "SELECT id FROM citas WHERE psicologa = ? AND fecha = ? AND hora = ? AND estado = 'Pendiente'";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("iss", $id_psicologa, $fecha, $hora);
$stmt_check->execute();
$resultado_check = $stmt_check->get_result();

if ($resultado_check->num_rows > 0) {
    $stmt_check->close();
    exit("Ya hay una cita agendada con esta psicóloga en la fecha y hora seleccionada.");
}
$stmt_check->close();

$sql_insert = "INSERT INTO citas (usuario, psicologa, fecha, hora, motivo, estado) VALUES (?, ?, ?, ?, ?, 'Pendiente')";
$stmt_insert = $conn->prepare($sql_insert);
$stmt_insert->bind_param("sisss", $usuario_estudiante, $id_psicologa, $fecha, $hora, $motivo);

if ($stmt_insert->execute()) {
    echo "ok";
} else {
    echo "Error al guardar la cita: " . $conn->error;
}

$stmt_insert->close();
$conn->close();
?>