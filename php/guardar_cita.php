<?php
session_start();
include "conexion.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Solo aceptar solicitudes POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Acceso no permitido");
}

// Verificar sesión
if (!isset($_SESSION['nombre'])) {
    exit("Debes iniciar sesión.");
}

$usuario   = $_SESSION['nombre'];
$psicologa = trim($_POST['psicologa'] ?? '');
$fecha     = trim($_POST['fecha'] ?? '');
$hora      = trim($_POST['hora'] ?? '');
$motivo    = trim($_POST['motivo'] ?? '');

// Validar campos
if (
    empty($psicologa) ||
    empty($fecha) ||
    empty($hora) ||
    empty($motivo)
) {
    exit("Completa todos los campos.");
}

/* Verificar si el usuario ya tiene una cita ese día */
$sql = "SELECT id FROM citas WHERE usuario = ? AND fecha = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    exit("Error SQL: " . $conn->error);
}

$stmt->bind_param("ss", $usuario, $fecha);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $stmt->close();
    exit("Ya tienes una cita programada para esa fecha.");
}

$stmt->close();

/* Verificar si la psicóloga ya tiene cita en esa fecha y hora */
$sql = "SELECT id FROM citas WHERE psicologa = ? AND fecha = ? AND hora = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    exit("Error SQL: " . $conn->error);
}

$stmt->bind_param("sss", $psicologa, $fecha, $hora);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $stmt->close();
    exit("La psicóloga ya tiene una cita en ese horario.");
}

$stmt->close();

/* Guardar cita */
$sql = "INSERT INTO citas (usuario, psicologa, fecha, hora, motivo)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    exit("Error SQL: " . $conn->error);
}

$stmt->bind_param(
    "sssss",
    $usuario,
    $psicologa,
    $fecha,
    $hora,
    $motivo
);

if ($stmt->execute()) {
    echo "ok";
} else {
    echo "Error SQL: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>