<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'psicologa') {
    header("Location: login.php");
    exit();
}

include("php/conexion.php"); 

$id_psicologa = $_SESSION['usuario_id'] ?? 0; 

if (isset($_POST['completar_id'])) {
    $id_cita = intval($_POST['completar_id']);
    $sql_update = "UPDATE citas SET estado = 'Completada' WHERE id = ? AND psicologa = ?";
    $stmt_up = $conn->prepare($sql_update);
    if ($stmt_up) {
        $stmt_up->bind_param("ii", $id_cita, $id_psicologa);
        $stmt_up->execute();
        $stmt_up->close();
    }
}

$hoy = date('Y-m-d');
$sql_hoy = "SELECT COUNT(*) AS total FROM citas WHERE psicologa = ? AND fecha = ? AND estado = 'Pendiente'";
$stmt_hoy = $conn->prepare($sql_hoy);
$stmt_hoy->bind_param("is", $id_psicologa, $hoy);
$stmt_hoy->execute();
$citas_hoy = $stmt_hoy->get_result()->fetch_assoc()['total'] ?? 0;
$stmt_hoy->close();

$sql_semana = "SELECT COUNT(*) AS total FROM citas WHERE psicologa = ? AND YEARWEEK(fecha, 1) = YEARWEEK(CURDATE(), 1) AND estado = 'Pendiente'";
$stmt_sem = $conn->prepare($sql_semana);
$stmt_sem->bind_param("i", $id_psicologa);
$stmt_sem->execute();
$citas_semana = $stmt_sem->get_result()->fetch_assoc()['total'] ?? 0;
$stmt_sem->close();

$sql_completadas = "SELECT COUNT(*) AS total FROM citas WHERE psicologa = ? AND estado = 'Completada'";
$stmt_comp = $conn->prepare($sql_completadas);
$stmt_comp->bind_param("i", $id_psicologa);
$stmt_comp->execute();
$citas_completadas = $stmt_comp->get_result()->fetch_assoc()['total'] ?? 0;
$stmt_comp->close();

$sql_pendientes = "SELECT COUNT(*) AS total FROM citas WHERE psicologa = ? AND estado = 'Pendiente'";
$stmt_pen = $conn->prepare($sql_pendientes);
$stmt_pen->bind_param("i", $id_psicologa);
$stmt_pen->execute();
$citas_pendientes = $stmt_pen->get_result()->fetch_assoc()['total'] ?? 0;
$stmt_pen->close();

$sql = "SELECT * FROM citas WHERE psicologa = ? AND estado = 'Pendiente' ORDER BY fecha, hora ASC";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    exit("Error SQL: " . $conn->error);
}

$stmt->bind_param("i", $id_psicologa); 
$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freshman Compass – Panel de Psicología</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="styles/panel.css">
</head>
<body>

<div class="container">
    <div class="header">
        <div class="welcome-section">
            <h1><i class="fa-solid fa-brain"></i> ¡Bienvenida, Miss. <?= htmlspecialchars($_SESSION['nombre']) ?>!</h1>
            <p>Estas son las citas agendadas para los estudiantes para usted.</p>
        </div>
        
        <div class="user-actions">
            <span class="user-name">Miss. <?= htmlspecialchars($_SESSION['nombre']) ?></span>
            <a href="php/logout.php" class="btn-logout"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a>
        </div>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon icon-cyan"><i class="fa-regular fa-calendar-days"></i></div>
            <div class="stat-info">
                <h3>Citas de hoy</h3>
                <div class="stat-number"><?= $citas_hoy ?></div>
                <p class="stat-desc"><?= $citas_hoy > 0 ? 'Tienes citas hoy' : 'Sin citas hoy' ?></p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon icon-cyan"><i class="fa-regular fa-calendar"></i></div>
            <div class="stat-info">
                <h3>Citas de esta semana</h3>
                <div class="stat-number"><?= $citas_semana ?></div>
                <p class="stat-desc"><?= $citas_semana > 0 ? 'Citas pendientes' : 'Sin citas esta semana' ?></p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon icon-green"><i class="fa-regular fa-circle-check"></i></div>
            <div class="stat-info">
                <h3>Citas completadas</h3>
                <div class="stat-number"><?= $citas_completadas ?></div>
                <p class="stat-desc">Esta semana</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon icon-orange"><i class="fa-regular fa-clock"></i></div>
            <div class="stat-info">
                <h3>Pendientes</h3>
                <div class="stat-number"><?= $citas_pendientes ?></div>
                <p class="stat-desc">Por atender</p>
            </div>
        </div>
    </div>

    <div class="main-card">
        <h2 class="card-title"><i class="fa-regular fa-calendar-check"></i> Control de Citas</h2>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Estudiante</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Motivo de la consulta</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($citas_pendientes > 0): ?>
                        <?php while($cita = $resultado->fetch_assoc()): ?>
                            <tr>
                                <td><strong><?= htmlspecialchars($cita['usuario']) ?></strong></td>
                                <td><?= htmlspecialchars($cita['fecha']) ?></td>
                                <td><?= htmlspecialchars($cita['hora']) ?></td>
                                <td><?= htmlspecialchars($cita['motivo']) ?></td>
                                <td>
                                    <form method="POST" style="margin:0;">
                                        <input type="hidden" name="completar_id" value="<?= $cita['id'] ?>">
                                        <button type="submit" class="btn-complete"><i class="fa-solid fa-check"></i> Completado</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">
                                <div class="no-citas-container">
                                    <div class="no-citas-icon"><i class="fa-regular fa-clipboard"></i></div>
                                    <h3 class="no-citas-text">No tienes ninguna cita agendada por el momento.</h3>
                                    <p class="no-citas-subtext">Cuando agendes citas con tus estudiantes, aparecerán aquí.</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>