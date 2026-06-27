<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agendar cita</title>

    <link rel="stylesheet" href="../styles/agendar.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>

<div class="badge">
    <i class="fa-solid fa-calendar-days"></i>
    Agenda tu bienestar
</div>

<div class="container">

    <h1>Agenda una cita con nuestras <span>psicólogas</span></h1>
    <p class="sub">Sesiones confidenciales y seguras</p>

    <form id="citaForm">

        <!-- PSICÓLOGAS -->
        <div class="cards">

            <div class="card" onclick="seleccionar('Ana Lucía Nieto', this)">
                <img src="../img/analu.jpeg">
                <h4>Ana Lucía Nieto</h4>
                <span>Psicóloga Educativa</span>
            </div>

            <div class="card" onclick="seleccionar('Blanca Marielos', this)">
                <img src="../img/marielos.jpeg">
                <h4>Blanca Marielos</h4>
                <span>Psicóloga Clínica</span>
            </div>

            <div class="card" onclick="seleccionar('Blanca Meléndez', this)">
                <img src="../img/blancamelen.png">
                <h4>Blanca Meléndez</h4>
                <span>Psicóloga Familiar</span>
            </div>

        </div>

        <!-- FORM -->
        <div class="form-box">

            <div class="input-group">
                <label><i class="fa-solid fa-user-doctor"></i> Psicóloga</label>
                <input type="text" id="psicologa" readonly>
            </div>

            <div class="input-group">
                <label><i class="fa-regular fa-calendar-days"></i> Fecha</label>
                <input type="text" id="fecha" placeholder="Selecciona fecha" required>
            </div>

            <button class="confirm-btn" type="submit">
                Confirmar cita
            </button>

        </div>

    </form>

    <div id="mensaje"></div>

</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="../JS/agendar.js"></script>

</body>
</html>