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
// Convertimos a entero para asegurar que sea el ID numérico
$psicologa = intval($_POST['psicologa'] ?? 0); 
$fecha     = trim($_POST['fecha'] ?? '');
$hora      = trim($_POST['hora'] ?? '');
$motivo    = trim($_POST['motivo'] ?? '');

// Validar campos (como $psicologa ahora es número, validamos que sea mayor a 0)
if (
    $psicologa <= 0 ||
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

// CORRECCIÓN: Cambiamos el primer parámetro a "i" porque $psicologa es un ID (entero)
$stmt->bind_param("iss", $psicologa, $fecha, $hora);
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

// CORRECCIÓN: El segundo parámetro pasa de "s" a "i" ("siss_s" -> usuario, psicologa, fecha, hora, motivo)
$stmt->bind_param(
    "sisss",
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